<script>
    function injectMathButton(editorElement) {
        if (!editorElement) return;
        const editor = editorElement.editor;
        if (!editor) return;
        const toolbar = editorElement.toolbarElement;
        if (!toolbar) return;
        
        // Check if we already added it
        if (toolbar.querySelector('.custom-math-btn')) return;

        // Find the main button row in Filament's custom Trix toolbar
        const buttonRow = toolbar.querySelector('.flex.gap-x-3');
        if (!buttonRow) return;

        // Create the button
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'custom-math-btn';
        btn.innerHTML = '<strong style="font-size: 1.2em;">∑</strong>';
        btn.title = 'Insert Math Symbol';
        btn.setAttribute('tabindex', '-1');
        
        // Filament button styles
        btn.style.display = 'inline-flex';
        btn.style.alignItems = 'center';
        btn.style.justifyContent = 'center';
        btn.style.width = '28px';
        btn.style.height = '28px';
        btn.style.borderRadius = '4px';
        btn.style.color = 'inherit';
        btn.style.cursor = 'pointer';
        btn.style.flexShrink = '0';
        
        btn.onmouseover = () => btn.style.backgroundColor = 'rgba(156, 163, 175, 0.2)';
        btn.onmouseout = () => btn.style.backgroundColor = 'transparent';

        // Create the dropdown container
        const popover = document.createElement('div');
        popover.className = 'math-symbols-popover';
        popover.style.display = 'none';
        popover.style.position = 'absolute';
        popover.style.backgroundColor = '#fff';
        popover.style.border = '1px solid #ccc';
        popover.style.padding = '8px';
        popover.style.borderRadius = '6px';
        popover.style.zIndex = '9999';
        popover.style.width = '280px';
        popover.style.boxShadow = '0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1)';
        popover.style.gridTemplateColumns = 'repeat(6, 1fr)';
        popover.style.gap = '4px';
        
        // Position it relative to the trix-toolbar
        popover.style.top = '45px';
        popover.style.right = '10px';

        const symbols = [
            '±', '×', '÷', '≈', '≠', '≤', '≥', '∞', '√', '∛', '∜', '∑', '∫', '∬', '∮',
            'π', 'θ', 'α', 'β', 'γ', 'Δ', 'Ω', 'μ', 'λ', 'φ', '∈', '∉', '⊂', '⊃', '∪', '∩',
            '∀', '∃', '∠', '△', '⊥', '∥', '°', '′', '″', '∴', '∵', '½', '¼', '¾', 'x²', 'x³'
        ];

        symbols.forEach(sym => {
            const symBtn = document.createElement('button');
            symBtn.type = 'button';
            symBtn.innerHTML = sym;
            symBtn.style.padding = '6px 4px';
            symBtn.style.border = '1px solid #e5e7eb';
            symBtn.style.borderRadius = '4px';
            symBtn.style.cursor = 'pointer';
            symBtn.style.backgroundColor = '#f9fafb';
            symBtn.style.fontSize = '14px';
            symBtn.style.color = '#374151';
            symBtn.style.display = 'flex';
            symBtn.style.alignItems = 'center';
            symBtn.style.justifyContent = 'center';
            symBtn.style.height = '32px';
            
            symBtn.onmouseover = () => { symBtn.style.backgroundColor = '#e0f2fe'; symBtn.style.color = '#0369a1'; };
            symBtn.onmouseout = () => { symBtn.style.backgroundColor = '#f9fafb'; symBtn.style.color = '#374151'; };
            
            symBtn.onclick = (e) => {
                e.preventDefault();
                e.stopPropagation();
                editor.insertString(sym);
            };
            popover.appendChild(symBtn);
        });

        // Add a close button at the bottom of the popover
        const closeBtn = document.createElement('button');
        closeBtn.type = 'button';
        closeBtn.innerHTML = 'បិទ (Close)';
        closeBtn.style.gridColumn = '1 / -1';
        closeBtn.style.marginTop = '4px';
        closeBtn.style.padding = '6px';
        closeBtn.style.backgroundColor = '#f3f4f6';
        closeBtn.style.border = '1px solid #e5e7eb';
        closeBtn.style.borderRadius = '4px';
        closeBtn.style.cursor = 'pointer';
        closeBtn.style.color = '#374151';
        closeBtn.style.fontWeight = 'bold';
        closeBtn.onclick = (e) => {
            e.preventDefault();
            e.stopPropagation();
            popover.style.display = 'none';
        }
        popover.appendChild(closeBtn);

        // Toggle popover
        btn.onclick = (e) => {
            e.preventDefault();
            e.stopPropagation();
            const isHidden = popover.style.display === 'none';
            // Hide all other popovers first
            document.querySelectorAll('.math-symbols-popover').forEach(p => p.style.display = 'none');
            
            if (isHidden) {
                popover.style.display = 'grid';
            }
        };

        const wrapper = document.createElement('div');
        wrapper.className = 'custom-math-wrapper';
        wrapper.style.display = 'inline-flex';
        wrapper.style.alignItems = 'center';
        wrapper.style.marginLeft = 'auto'; // push to right if possible
        wrapper.style.paddingLeft = '10px';
        wrapper.appendChild(btn);

        // Append button to the overflow-x-auto row
        buttonRow.appendChild(wrapper);
        
        // Append popover to the parent trix-toolbar so it is NOT clipped!
        toolbar.appendChild(popover);
    }

    // 1. Listen for new editors
    document.addEventListener('trix-initialize', function(event) {
        injectMathButton(event.target);
    });

    // 2. Poll for existing editors
    setInterval(() => {
        document.querySelectorAll('trix-editor').forEach(editor => {
            injectMathButton(editor);
        });
    }, 500);

    // Close popovers when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.custom-math-btn') && !e.target.closest('.math-symbols-popover')) {
            document.querySelectorAll('.math-symbols-popover').forEach(p => p.style.display = 'none');
        }
    });

</script>
<style>
    /* Add styling for dark mode compatibility */
    .dark .math-symbols-popover {
        background-color: #1f2937 !important;
        border-color: #374151 !important;
    }
    .dark .math-symbols-popover button {
        background-color: #374151 !important;
        border-color: #4b5563 !important;
        color: #e5e7eb !important;
    }
    .dark .math-symbols-popover button:hover {
        background-color: #0369a1 !important;
        color: #e0f2fe !important;
    }
</style>
