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
    </style>
</head>
<body oncontextmenu="return false;"> <!-- Disable right-click globally -->

    <div id="toolbar">
        <div class="brand">ANONTAK Reader</div>
        <div class="controls">
            <button id="prev" disabled>ទំព័រមុន (Prev)</button>
            <span style="font-size: 0.9rem;">ទំព័រ <span id="page_num"></span> / <span id="page_count"></span></span>
            <button id="next">ទំព័របន្ទាប់ (Next)</button>
        </div>
        <div>
            <button onclick="window.close()" style="background-color: #ef4444;">បិទ (Close)</button>
        </div>
    </div>

    <div id="viewer-container">
        <div id="canvas-wrapper">
            <canvas id="pdf-render"></canvas>
            <div class="protection-overlay"></div>
        </div>
    </div>

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

        // Initialize PDF.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

        const url = '/sample.pdf';

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

        // Update button states
        const updateButtons = () => {
            document.querySelector('#prev').disabled = pageNum <= 1;
            document.querySelector('#next').disabled = pageNum >= pdfDoc.numPages;
        };

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
