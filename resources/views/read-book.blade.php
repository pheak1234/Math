<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure PDF Reader - ANONTAK</title>
    <!-- Include PDF.js from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #1e293b; /* Dark slate background */
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            font-family: sans-serif;
            /* Disable selection */
            user-select: none;
            -webkit-user-select: none;
        }

        /* Top toolbar */
        #toolbar {
            width: 100%;
            height: 60px;
            background-color: #0f172a;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            box-sizing: border-box;
            box-shadow: 0 2px 10px rgba(0,0,0,0.5);
            z-index: 10;
        }

        .brand {
            font-weight: bold;
            font-size: 1.2rem;
            color: #38bdf8;
        }

        .controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        button {
            background-color: #334155;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.2s;
        }

        button:hover {
            background-color: #475569;
        }

        button:disabled {
            background-color: #1e293b;
            color: #64748b;
            cursor: not-allowed;
        }

        /* Viewer container */
        #viewer-container {
            flex: 1;
            width: 100%;
            overflow-y: auto;
            display: flex;
            justify-content: center;
            padding: 20px 0;
            box-sizing: border-box;
        }

        /* PDF canvas */
        canvas {
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            background-color: white;
            max-width: 100%;
            height: auto !important;
        }

        /* Overlay to prevent dragging/inspecting image directly if it was an image */
        #canvas-wrapper {
            position: relative;
        }
        
        .protection-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 5;
            /* Transparent block so right clicks on canvas itself are intercepted */
        }

        /* Dynamic Watermark */
        .watermark-container {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 10;
            pointer-events: none;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: center;
            opacity: 0.12; /* Visible enough to deter, light enough to read */
        }
        
        .watermark-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #000;
            transform: rotate(-30deg);
            margin: 50px 80px;
            user-select: none;
            white-space: nowrap;
        }

        /* Print Blocker */
        @media print {
            body {
                display: none !important;
            }
        }
    </style>
</head>
<body oncontextmenu="return false;"> <!-- Disable right-click globally -->

    <div id="toolbar">
        <div class="brand">ANONTAK Reader</div>
        <div class="controls">
            <button id="prev" disabled>ទំព័រមុន (Prev)</button>
            <span style="font-size: 0.9rem;">
                ទំព័រ <span id="page_num"></span> / <span id="page_count"></span>
                <span style="margin: 0 8px; color: #94a3b8;">|</span>
                <span id="progress-text" style="color: #38bdf8; font-weight: bold;">0%</span>
            </span>
            <button id="next">ទំព័របន្ទាប់ (Next)</button>
        </div>
        <div>
            <button onclick="window.close(); window.location.href='/dashboard';" style="background-color: #ef4444;">បិទ (Close)</button>
        </div>
    </div>

    <!-- Progress Bar -->
    <div id="progress-bar-container" style="width: 100%; height: 4px; background-color: #334155; position: relative; z-index: 9;">
        <div id="progress-bar" style="width: 0%; height: 100%; background-color: #38bdf8; transition: width 0.2s;"></div>
    </div>

    <div id="viewer-container">
        <div id="canvas-wrapper">
            <canvas id="pdf-render"></canvas>
            <div class="protection-overlay"></div>
            
            <!-- Dynamic Watermark Overlay -->
            <div class="watermark-container">
                @for ($i = 0; $i < 20; $i++)
                    <div class="watermark-text">{{ Auth::user()->name }} | {{ Auth::user()->phone ?? Auth::user()->email }}</div>
                @endfor
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        // Restrict keyboard shortcuts (Ctrl+S, Ctrl+P, PrintScreen)
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                // Disable Ctrl+S (Save), Ctrl+P (Print), Ctrl+C (Copy)
                if (e.key === 's' || e.key === 'p' || e.key === 'c') {
                    e.preventDefault();
                    alert('សកម្មភាពនេះត្រូវបានហាមឃាត់! (Action Disabled)');
                }
            }
        });

        // Prevent PrintScreen key
        document.addEventListener('keyup', (e) => {
            if (e.key === 'PrintScreen' || e.keyCode === 44) {
                navigator.clipboard.writeText(''); // Attempt to clear clipboard
                document.body.style.display = 'none'; // Blank the screen
                alert('ការថតអេក្រង់ត្រូវបានហាមឃាត់យ៉ាងតឹងរ៉ឹង! (Screenshots are strictly prohibited)');
                window.location.href = '/dashboard';
            }
        });

        // Add a blanking overlay instead of CSS blur (which breaks layout)
        const blurOverlay = document.createElement('div');
        blurOverlay.style.position = 'fixed';
        blurOverlay.style.top = '0';
        blurOverlay.style.left = '0';
        blurOverlay.style.width = '100vw';
        blurOverlay.style.height = '100vh';
        blurOverlay.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
        blurOverlay.style.zIndex = '9999';
        blurOverlay.style.display = 'none';
        blurOverlay.style.justifyContent = 'center';
        blurOverlay.style.alignItems = 'center';
        blurOverlay.style.fontSize = '24px';
        blurOverlay.style.fontWeight = 'bold';
        blurOverlay.style.color = '#ef4444';
        blurOverlay.innerText = 'ផ្អាកជាបណ្តោះអាសន្ន (Paused)';
        document.body.appendChild(blurOverlay);

        // Hide screen when the mouse leaves the browser window (prevents Snipping Tool)
        document.addEventListener('mouseleave', () => {
            blurOverlay.style.display = 'flex';
        });
        
        document.addEventListener('mouseenter', () => {
            blurOverlay.style.display = 'none';
        });

        // Hide screen when window loses focus
        window.addEventListener('blur', () => {
            blurOverlay.style.display = 'flex';
        });
        
        window.addEventListener('focus', () => {
            blurOverlay.style.display = 'none';
        });

        // Initialize PDF.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

        // Assuming the book has a pdf_url attribute or using a default for demo
        const url = '{{ $book->pdf_url ?? "/sample.pdf" }}';
        const bookId = '{{ $book->id }}';

        let pdfDoc = null,
            pageNum = 1,
            pageIsRendering = false,
            pageNumIsPending = null;

        const scale = 1.5,
              canvas = document.querySelector('#pdf-render'),
              ctx = canvas.getContext('2d');

        // Render the page
        const renderPage = num => {
            pageIsRendering = true;

            // Get page
            pdfDoc.getPage(num).then(page => {
                const viewport = page.getViewport({ scale });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport: viewport
                };

                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;

                    if (pageNumIsPending !== null) {
                        renderPage(pageNumIsPending);
                        pageNumIsPending = null;
                    }
                    
                    // Update progress after canvas is fully sized and rendered
                    if (typeof updateProgress === 'function') {
                        updateProgress();
                    }
                });

                // Output current page
                document.querySelector('#page_num').textContent = num;
            });
        };

        // Check for pages pending rendering
        const queueRenderPage = num => {
            if (pageIsRendering) {
                pageNumIsPending = num;
            } else {
                renderPage(num);
            }
        };

        // Show Prev Page
        const showPrevPage = () => {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
            updateButtons();
        };

        // Show Next Page
        const showNextPage = () => {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
            updateButtons();
        };

        // Update button states and progress bar
        const updateButtons = () => {
            document.querySelector('#prev').disabled = pageNum <= 1;
            document.querySelector('#next').disabled = pageNum >= pdfDoc.numPages;
            updateProgress();
        };

        // Store the maximum progress achieved
        let maxPercentage = {{ $currentProgress ?? 0 }};
        
        // Initial setup of progress bar if already read before
        if(maxPercentage > 0) {
            document.querySelector('#progress-bar').style.width = Math.round(maxPercentage) + '%';
            const textEl = document.querySelector('#progress-text');
            if (textEl) {
                textEl.textContent = Math.round(maxPercentage) + '%';
            }
        }

        // Calculate Reading Progress
        const updateProgress = () => {
            if (!pdfDoc) return;
            
            let percentage = 0;
            if (pdfDoc.numPages > 1) {
                // Page-based percentage
                percentage = Math.round((pageNum / pdfDoc.numPages) * 100);
            } else {
                // Scroll-based percentage for 1-page documents
                const container = document.querySelector('#viewer-container');
                const scrolled = container.scrollTop;
                const totalHeight = container.scrollHeight - container.clientHeight;
                
                if (totalHeight > 0) {
                    percentage = Math.round((scrolled / totalHeight) * 100);
                } else {
                    percentage = 100; // fits entirely on screen
                }
            }
            
            // Limit percentage between 0 and 100 just in case
            if (percentage < 0) percentage = 0;
            if (percentage > 100) percentage = 100;

            // Only increase the progress (don't decrease if user scrolls/flips back)
            if (percentage > maxPercentage) {
                maxPercentage = percentage;
                saveProgressToDatabase(maxPercentage);
            }

            document.querySelector('#progress-bar').style.width = Math.round(maxPercentage) + '%';
            
            const textEl = document.querySelector('#progress-text');
            if (textEl) {
                textEl.textContent = Math.round(maxPercentage) + '%';
            }
        };

        // Function to save progress via AJAX
        let progressTimeout;
        const saveProgressToDatabase = (progress) => {
            clearTimeout(progressTimeout);
            progressTimeout = setTimeout(() => {
                fetch(`/books/${bookId}/progress`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ progress: Math.round(progress) })
                })
                .then(response => response.json())
                .then(data => console.log('Progress saved:', data))
                .catch(err => console.error('Error saving progress', err));
            }, 1000); // Debounce for 1 second so it doesn't spam the server when scrolling
        };

        // Listen for scroll events to update progress (important for 1-page PDFs)
        document.querySelector('#viewer-container').addEventListener('scroll', () => {
            if (pdfDoc && pdfDoc.numPages === 1) {
                updateProgress();
            }
        });

        // Get Document
        pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
            pdfDoc = pdfDoc_;
            document.querySelector('#page_count').textContent = pdfDoc.numPages;
            renderPage(pageNum);
            updateButtons();
        }).catch(err => {
            console.error('Error opening PDF:', err);
            // Div error container
            const div = document.createElement('div');
            div.className = 'error';
            div.textContent = 'បរាជ័យក្នុងការបើកឯកសារ PDF (Failed to load PDF)';
            div.style.color = '#ef4444';
            div.style.marginTop = '20px';
            document.querySelector('#viewer-container').appendChild(div);
        });

        // Button Events
        document.querySelector('#prev').addEventListener('click', showPrevPage);
        document.querySelector('#next').addEventListener('click', showNextPage);
    </script>
</body>
</html>
