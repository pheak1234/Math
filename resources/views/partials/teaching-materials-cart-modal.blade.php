<!-- ==========================================
     TEACHING MATERIALS CART & GROUP CHECKOUT
     ========================================== -->

<!-- 1. Toast Notification for Cart Actions -->
<div id="tmCartToast" class="fixed top-20 right-4 sm:right-8 z-50 transform translate-y-[-20px] opacity-0 pointer-events-none transition-all duration-300 max-w-sm w-full">
    <div class="bg-slate-900/95 backdrop-blur-md text-white p-4 rounded-2xl shadow-2xl border border-slate-700/80 flex items-center justify-between gap-3">
        <div class="flex items-center gap-3 min-w-0">
            <div class="w-8 h-8 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div class="min-w-0">
                <p id="tmCartToastMsg" class="text-xs font-bold text-white truncate">បានបន្ថែមទៅកន្ត្រក!</p>
                <p class="text-[10px] text-slate-400">អ្នកអាចកម្ម៉ង់ទិញរួមគ្នាបាន</p>
            </div>
        </div>
        <button type="button" onclick="window.openTMCartModal()" class="px-3 py-1.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-white text-[11px] font-bold shrink-0 transition-colors cursor-pointer">
            មើលកន្ត្រក
        </button>
    </div>
</div>

<!-- 3. Cart & Group Checkout Modal -->
<div id="tmCartModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-3 sm:p-4">
    <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[92vh] flex flex-col shadow-2xl border border-slate-100 relative overflow-hidden animate-in fade-in zoom-in-95 duration-200">
        
        <!-- Modal Header -->
        <div class="p-5 sm:p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50 shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center shadow-xs">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2">
                        <span>កន្ត្រកសម្ភារៈបង្រៀន</span>
                        <span id="tmCartHeaderCount" class="text-xs px-2.5 py-0.5 rounded-full bg-amber-500 text-white font-extrabold">0 មុខ</span>
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">កម្ម៉ង់ទិញរួមគ្នា និងទូទាត់ប្រាក់តែម្ដង</p>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" 
                        id="tmClearCartBtn" 
                        onclick="window.clearTMCart()" 
                        class="hidden text-xs text-rose-600 hover:text-rose-700 font-semibold px-2.5 py-1.5 rounded-lg hover:bg-rose-50 transition-colors cursor-pointer">
                    លុបទាំងអស់
                </button>
                <button type="button" 
                        onclick="window.closeTMCartModal()" 
                        aria-label="Close" 
                        class="p-2 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-5 sm:p-6 overflow-y-auto space-y-6 flex-1">
            
            <!-- Empty State -->
            <div id="tmCartEmptyState" class="hidden py-12 text-center space-y-3">
                <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-3xl flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h4 class="text-sm font-bold text-slate-700">មិនទាន់មានសម្ភារៈក្នុងកន្ត្រកនៅឡើយទេ</h4>
                <p class="text-xs text-slate-500 max-w-sm mx-auto">សូមជ្រើសរើសសម្ភារៈបង្រៀនដែលអ្នកពេញចិត្ត រួចចុច "ថែមទៅកន្ត្រក" ដើម្បីកម្ម៉ង់រួមគ្នា។</p>
                <div class="pt-2">
                    <a href="{{ route('teaching-materials.index') }}" 
                       onclick="window.closeTMCartModal()" 
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold transition-colors shadow-sm">
                        <span>ទៅកាន់បញ្ជីសម្ភារៈបង្រៀន</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Active Cart Content -->
            <div id="tmCartContent" class="space-y-6">
                
                <!-- Items List -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500">បញ្ជីសម្ភារៈក្នុងកន្ត្រក</h4>
                    <div id="tmCartItemsList" class="space-y-2.5">
                        <!-- Populated by JavaScript -->
                    </div>
                </div>

                <!-- Price Summary Card -->
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200/80 space-y-2 text-xs">
                    <div class="flex items-center justify-between text-slate-600">
                        <span>ចំនួនសម្ភារៈសរុប៖</span>
                        <span id="tmSummaryTotalQty" class="font-bold text-slate-800 font-mono">0</span>
                    </div>
                    <div class="flex items-center justify-between text-slate-600">
                        <span>តម្លៃទំនិញសរុប៖</span>
                        <span id="tmSummarySubtotal" class="font-bold text-slate-800 font-mono">$0.00</span>
                    </div>
                    <div class="flex items-center justify-between text-slate-600">
                        <span>សេវាដឹកជញ្ជូន៖</span>
                        <span class="text-emerald-600 font-semibold">គិតពេលដឹកជញ្ជូនជាក់ស្ដែង</span>
                    </div>
                    <div class="border-t border-slate-200 pt-2 flex items-center justify-between text-sm font-extrabold text-slate-900">
                        <span>ទឹកប្រាក់ត្រូវទូទាត់សរុប៖</span>
                        <span id="tmSummaryGrandTotal" class="text-lg text-amber-600 font-black font-mono">$0.00</span>
                    </div>
                </div>

                <!-- Group Order Checkout Form -->
                <form id="tmGroupOrderForm" method="POST" action="{{ route('teaching-materials.group-order') }}" enctype="multipart/form-data" class="space-y-4 pt-2 border-t border-slate-100">
                    @csrf
                    <input type="hidden" name="order_code" id="tmGroupOrderCode">
                    <input type="hidden" name="cart_items" id="tmGroupCartItemsInput">

                    <div class="p-3 bg-sky-50/80 border border-sky-100 rounded-xl flex items-center justify-between text-xs">
                        <div class="flex items-center gap-1.5 text-slate-700">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            <span class="font-medium">លេខយោងវិក្កយបត្រ (Bill Ref):</span>
                        </div>
                        <span class="font-mono font-bold text-sky-700 bg-white px-2 py-0.5 rounded border border-sky-200" id="tmGroupDisplayCode">...</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">ឈ្មោះអតិថិជន *</label>
                            <input type="text" name="customer_name" required value="{{ Auth::check() ? Auth::user()->name : '' }}" placeholder="ឧ. សុខ ចាន់ថា" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">លេខទូរស័ព្ទ *</label>
                            <input type="text" name="customer_phone" required value="{{ Auth::check() ? (Auth::user()->phone ?? '') : '' }}" placeholder="ឧ. 012 345 678" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">ទីតាំង និងអាសយដ្ឋានដឹកជញ្ជូន *</label>
                        <input type="text" name="customer_address" required placeholder="ឧ. ផ្ទះលេខ..., ផ្លូវ..., សង្កាត់..., រាជធានីភ្នំពេញ / ខេត្ត..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">ចំណាំបន្ថែម (ស្រេចចិត្ត)</label>
                        <textarea name="notes" rows="2" placeholder="ព័ត៌មានបន្ថែម ឬពេលវេលាដែលងាយស្រួលទទួលសម្ភារៈ..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500"></textarea>
                    </div>

                    <!-- Payment Method -->
                    <div class="pt-2 border-t border-slate-100">
                        <label class="block text-xs font-semibold text-slate-700 mb-2">វិធីសាស្ត្របង់ប្រាក់ *</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="relative flex items-center justify-center gap-2 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors">
                                <input type="radio" id="tmCartMethodCod" name="payment_method" value="cod" class="peer sr-only" checked onchange="window.toggleCartKHQR(false)">
                                <div class="w-4 h-4 rounded-full border border-slate-300 peer-checked:border-[4px] peer-checked:border-sky-500"></div>
                                <span class="text-xs font-bold text-slate-700">បង់ប្រាក់ពេលទទួល (COD)</span>
                            </label>
                            <label class="relative flex items-center justify-center gap-2 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors">
                                <input type="radio" id="tmCartMethodKhqr" name="payment_method" value="khqr" class="peer sr-only" onchange="window.toggleCartKHQR(true)">
                                <div class="w-4 h-4 rounded-full border border-slate-300 peer-checked:border-[4px] peer-checked:border-sky-500"></div>
                                <span class="text-xs font-bold text-slate-700">ABA / KHQR (ស្កេនទូទាត់)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Dynamic KHQR Section -->
                    <div id="tmCartKhqrSection" class="hidden space-y-4 p-4 bg-sky-50 rounded-2xl border border-sky-100 text-center">
                        <p class="text-xs text-sky-800 font-bold">សូមស្កេន QR Code ខាងក្រោម ដើម្បីទូទាត់ទឹកប្រាក់សរុប៖</p>
                        <div class="w-56 h-56 bg-white rounded-2xl border border-sky-200 mx-auto flex items-center justify-center shadow-xs p-2">
                            <canvas id="tmCartKHQRCanvas" class="max-w-full max-h-full"></canvas>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-1">* QR នេះបង្កើតឡើងដោយស្វ័យប្រវត្តិតាមតម្លៃសរុបនៃកញ្ចប់សម្ភារៈ <strong class="text-sky-700" id="tmCartRefText">#TM</strong></p>

                        <!-- Live Payment Status Polling Indicator -->
                        <div id="tmCartKhqrWaitingStatus" class="flex items-center justify-center gap-2 text-xs text-amber-600 font-semibold py-1">
                            <svg class="w-4 h-4 animate-spin text-amber-500" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                            <span>ប្រព័ន្ធកំពុងរង់ចាំការទូទាត់ស្វ័យប្រវត្តិ...</span>
                        </div>

                        <!-- Modern Receipt Upload -->
                        <div class="space-y-1.5 text-left pt-2 border-t border-sky-200/60">
                            <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>រូបភាពបង្កាន់ដៃបង់ប្រាក់ (Receipt Screenshot)</span>
                                </span>
                                <span class="text-[10px] text-sky-700 font-semibold bg-white px-2 py-0.5 rounded-full border border-sky-200">ជម្រើសផ្ទៀងផ្ទាត់</span>
                            </label>

                            <div id="tmCartReceiptDropzone" onclick="document.getElementById('tmCartPaymentReceiptInput').click()" class="relative group border-2 border-dashed border-sky-200 hover:border-sky-500 bg-white/80 hover:bg-white rounded-2xl p-3 text-center cursor-pointer transition-all duration-200">
                                <input type="file" name="payment_receipt" id="tmCartPaymentReceiptInput" accept="image/*" class="hidden" onchange="window.handleCartReceiptPreview(this)">
                                
                                <!-- Empty State -->
                                <div id="tmCartReceiptEmptyState" class="space-y-1.5 py-1">
                                    <div class="w-10 h-10 bg-sky-50 text-sky-600 rounded-xl flex items-center justify-center mx-auto shadow-2xs border border-sky-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                    </div>
                                    <p class="text-xs font-bold text-slate-700 group-hover:text-sky-700 transition-colors">
                                        ចុចជ្រើសរើសរូបភាព ឬទម្លាក់រូបភាពបង្កាន់ដៃនៅទីនេះ
                                    </p>
                                    <p class="text-[10px] text-slate-400">
                                        JPG, PNG ឬ WEBP (ទំហំអតិបរមា 5MB)
                                    </p>
                                </div>

                                <!-- Live Preview State -->
                                <div id="tmCartReceiptPreviewState" class="hidden flex items-center justify-between gap-3 bg-slate-50 p-2 rounded-xl border border-sky-100 text-left" onclick="event.stopPropagation()">
                                    <div class="flex items-center gap-2.5 min-w-0">
                                        <img id="tmCartReceiptPreviewImg" src="" alt="Receipt" class="w-10 h-10 object-cover rounded-lg border border-slate-200 shrink-0">
                                        <div class="min-w-0">
                                            <p id="tmCartReceiptFileName" class="text-xs font-bold text-slate-800 truncate">receipt.png</p>
                                            <p id="tmCartReceiptFileSize" class="text-[10px] text-slate-400">120 KB</p>
                                        </div>
                                    </div>
                                    <button type="button" onclick="window.removeCartReceiptFile(event)" class="p-1 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors cursor-pointer shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Actions -->
                    <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-3 pt-4 border-t border-slate-100">
                        <button type="button" 
                                onclick="window.closeTMCartModal()" 
                                class="w-full sm:w-1/3 py-3.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-2xl text-xs sm:text-sm font-bold transition-all cursor-pointer text-center active:scale-[0.98]">
                            បន្តរើសសម្ភារៈ
                        </button>
                        <button type="submit" 
                                id="tmSubmitGroupOrderBtn" 
                                class="w-full sm:w-2/3 py-3.5 px-5 bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 hover:from-amber-600 hover:via-orange-600 hover:to-amber-700 text-white rounded-2xl text-xs sm:text-sm font-black transition-all shadow-lg shadow-orange-500/25 hover:shadow-orange-500/35 cursor-pointer flex items-center justify-center gap-2 active:scale-[0.98]">
                            <svg class="w-4 h-4 text-white shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span id="tmSubmitBtnText" class="truncate">បញ្ជាក់ការកម្ម៉ង់</span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>

<!-- 4. Global Cart Engine JavaScript -->
<script>
(function() {
    const CART_STORAGE_KEY = 'anontak_tm_cart';
    let currentCartCode = '';

    window.getTMCart = function() {
        try {
            const raw = localStorage.getItem(CART_STORAGE_KEY);
            return raw ? JSON.parse(raw) : [];
        } catch(e) {
            return [];
        }
    };

    window.saveTMCart = function(cart) {
        try {
            localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));
        } catch(e) {}
        window.updateTMCartBadges();
    };

    window.addTMCart = function(item, qty = 1, openCart = false) {
        if (!item || !item.id) return;
        const cart = window.getTMCart();
        const existingIndex = cart.findIndex(c => c.id == item.id);
        
        const price = item.price ? parseFloat(item.price) : 0;
        let imgSrc = item.image || '/images/tool_ruler.svg';
        if (item.image && !item.image.startsWith('/') && !item.image.startsWith('http')) {
            imgSrc = '/storage/' + item.image;
        }

        if (existingIndex > -1) {
            cart[existingIndex].quantity = (cart[existingIndex].quantity || 1) + qty;
        } else {
            cart.push({
                id: item.id,
                name: item.name || 'សម្ភារៈបង្រៀន',
                price: price,
                image: imgSrc,
                category: item.category || 'សម្ភារៈ',
                grade_level: item.grade_level || '',
                quantity: qty
            });
        }

        window.saveTMCart(cart);
        window.showTMCartToast('បានបន្ថែម "' + (item.name || 'សម្ភារៈ') + '" ទៅកន្ត្រក!');

        if (openCart) {
            window.openTMCartModal();
        }
    };

    window.updateTMCartQty = function(id, delta) {
        const cart = window.getTMCart();
        const item = cart.find(c => c.id == id);
        if (item) {
            item.quantity = (item.quantity || 1) + delta;
            if (item.quantity <= 0) {
                window.removeTMCartItem(id);
                return;
            }
            window.saveTMCart(cart);
            window.renderTMCart();
        }
    };

    window.removeTMCartItem = function(id) {
        let cart = window.getTMCart();
        cart = cart.filter(c => c.id != id);
        window.saveTMCart(cart);
        window.renderTMCart();
    };

    window.clearTMCart = function() {
        if (confirm('តើអ្នកពិតជាចង់លុបសម្ភារៈទាំងអស់ចេញពីកន្ត្រកមែនទេ?')) {
            window.saveTMCart([]);
            window.renderTMCart();
        }
    };

    window.updateTMCartBadges = function() {
        const cart = window.getTMCart();
        const totalCount = cart.reduce((sum, item) => sum + (parseInt(item.quantity) || 1), 0);

        // Header badge
        const headerBadge = document.getElementById('headerCartBadge');
        if (headerBadge) {
            headerBadge.textContent = totalCount;
            if (totalCount > 0) {
                headerBadge.style.display = 'inline-flex';
            } else {
                headerBadge.style.display = 'none';
            }
        }

        // Modal header count
        const headerCount = document.getElementById('tmCartHeaderCount');
        if (headerCount) headerCount.textContent = totalCount + ' មុខ';
    };

    window.showTMCartToast = function(msg) {
        const toast = document.getElementById('tmCartToast');
        const toastMsg = document.getElementById('tmCartToastMsg');
        if (!toast || !toastMsg) return;

        toastMsg.textContent = msg;
        toast.classList.remove('opacity-0', 'translate-y-[-20px]', 'pointer-events-none');
        toast.classList.add('opacity-100', 'translate-y-0');

        if (window._tmToastTimer) clearTimeout(window._tmToastTimer);
        window._tmToastTimer = setTimeout(() => {
            toast.classList.remove('opacity-100', 'translate-y-0');
            toast.classList.add('opacity-0', 'translate-y-[-20px]', 'pointer-events-none');
        }, 3000);
    };

    window.renderTMCart = function() {
        const cart = window.getTMCart();
        const emptyState = document.getElementById('tmCartEmptyState');
        const cartContent = document.getElementById('tmCartContent');
        const clearBtn = document.getElementById('tmClearCartBtn');
        const itemsList = document.getElementById('tmCartItemsList');

        if (!emptyState || !cartContent || !itemsList) return;

        if (cart.length === 0) {
            emptyState.classList.remove('hidden');
            cartContent.classList.add('hidden');
            if (clearBtn) clearBtn.classList.add('hidden');
            return;
        }

        emptyState.classList.add('hidden');
        cartContent.classList.remove('hidden');
        if (clearBtn) clearBtn.classList.remove('hidden');

        let totalQty = 0;
        let subtotal = 0;

        itemsList.innerHTML = cart.map(item => {
            const qty = item.quantity || 1;
            const price = parseFloat(item.price) || 0;
            const lineTotal = price * qty;
            totalQty += qty;
            subtotal += lineTotal;

            return `
                <div class="p-3 bg-white rounded-2xl border border-slate-200/90 shadow-2xs flex items-center justify-between gap-3 group hover:border-amber-300 transition-colors">
                    <div class="flex items-center gap-3 min-w-0 flex-1">
                        <img src="${item.image}" alt="${item.name}" class="w-12 h-12 rounded-xl object-contain bg-slate-50 p-1 border border-slate-100 shrink-0">
                        <div class="min-w-0 flex-1">
                            <h5 class="text-xs font-bold text-slate-900 truncate">${item.name}</h5>
                            <div class="flex items-center gap-2 mt-0.5 text-[11px] text-slate-500">
                                <span class="text-amber-600 font-extrabold font-mono">${price > 0 ? '$' + price.toFixed(2) : 'Free'}</span>
                                ${item.category ? `<span class="text-[10px] bg-slate-100 text-slate-600 px-2 py-0.2 rounded-full">${item.category}</span>` : ''}
                            </div>
                        </div>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="flex items-center gap-1.5 shrink-0">
                        <div class="flex items-center bg-slate-100 rounded-xl p-0.5 border border-slate-200/80">
                            <button type="button" onclick="window.updateTMCartQty(${item.id}, -1)" class="w-6 h-6 rounded-lg bg-white hover:bg-slate-200 text-slate-700 flex items-center justify-center text-xs font-black cursor-pointer shadow-2xs">−</button>
                            <span class="w-8 text-center text-xs font-bold text-slate-800 font-mono">${qty}</span>
                            <button type="button" onclick="window.updateTMCartQty(${item.id}, 1)" class="w-6 h-6 rounded-lg bg-white hover:bg-slate-200 text-slate-700 flex items-center justify-center text-xs font-black cursor-pointer shadow-2xs">+</button>
                        </div>
                        <div class="w-16 text-right font-mono font-bold text-xs text-slate-900">
                            $${lineTotal.toFixed(2)}
                        </div>
                        <button type="button" onclick="window.removeTMCartItem(${item.id})" class="p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors cursor-pointer" title="លុបមុខនេះ">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </div>
            `;
        }).join('');

        // Summary elements
        const totalQtyEl = document.getElementById('tmSummaryTotalQty');
        if (totalQtyEl) totalQtyEl.textContent = totalQty;

        const subtotalEl = document.getElementById('tmSummarySubtotal');
        if (subtotalEl) subtotalEl.textContent = '$' + subtotal.toFixed(2);

        const grandTotalEl = document.getElementById('tmSummaryGrandTotal');
        if (grandTotalEl) grandTotalEl.textContent = '$' + subtotal.toFixed(2);

        const submitBtnText = document.getElementById('tmSubmitBtnText');
        if (submitBtnText) {
            submitBtnText.textContent = 'បញ្ជាក់ការកម្ម៉ង់ (' + (subtotal > 0 ? '$' + subtotal.toFixed(2) : 'Free') + ')';
        }

        // Hidden input for backend form
        const cartInput = document.getElementById('tmGroupCartItemsInput');
        if (cartInput) cartInput.value = JSON.stringify(cart);

        // Regenerate KHQR if KHQR is active
        const khqrRadio = document.getElementById('tmCartMethodKhqr');
        if (khqrRadio && khqrRadio.checked) {
            window.toggleCartKHQR(true);
        }
    };

    window.stopCartPaymentPolling = function() {
        if (cartPaymentPollingInterval) {
            clearInterval(cartPaymentPollingInterval);
            cartPaymentPollingInterval = null;
        }
    };

    window.startCartPaymentPolling = function(orderCode) {
        window.stopCartPaymentPolling();
        if (!orderCode) return;

        cartPaymentPollingInterval = setInterval(async () => {
            try {
                const res = await fetch(`/orders/check-status/${orderCode}`);
                const data = await res.json();
                if (data && data.is_paid) {
                    window.stopCartPaymentPolling();
                    
                    const contentEl = document.getElementById('tmCartContent');
                    if (contentEl) {
                        contentEl.innerHTML = `
                            <div class="py-12 px-4 text-center space-y-4">
                                <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto text-3xl font-bold shadow-xs">✓</div>
                                <h3 class="text-xl font-black text-slate-900">ការទូទាត់ទទួលបានជោគជ័យ!</h3>
                                <p class="text-xs text-slate-600 max-w-sm mx-auto">
                                    ប្រព័ន្ធបានទទួល និងផ្ទៀងផ្ទាត់ការទូទាត់តាម ABA / KHQR ដោយស្វ័យប្រវត្តិ។<br>
                                    លេខកូដវិក្កយបត្រ៖ <strong class="text-emerald-700 font-mono">#${orderCode}</strong>
                                </p>
                                <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-2xl text-xs text-emerald-800 text-left max-w-md mx-auto space-y-1">
                                    <p class="font-bold flex items-center gap-1.5 text-emerald-900">
                                        <span>✓</span> ការបញ្ជាទិញបានបញ្ចូលទៅក្នុងប្រព័ន្ធរួចរាល់
                                    </p>
                                    <p class="text-[11px] text-emerald-700">
                                        ក្រុមការងារនឹងរៀបចំវេចខ្ចប់ និងដឹកជញ្ជូនសម្ភារៈទៅកាន់អាសយដ្ឋានរបស់អ្នកក្នុងពេលឆាប់ៗ។
                                    </p>
                                </div>
                                <div class="pt-4">
                                    <button type="button" onclick="window.saveTMCart([]); window.closeTMCartModal(); window.location.reload();" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition-all shadow-md shadow-emerald-500/20 cursor-pointer">
                                        យល់ព្រម
                                    </button>
                                </div>
                            </div>
                        `;
                    }
                    window.saveTMCart([]);
                }
            } catch (e) {
                console.error('Polling error:', e);
            }
        }, 2500);
    };

    window.openTMCartModal = function() {
        if (!currentCartCode) {
            currentCartCode = 'TM' + Math.floor(10000 + Math.random() * 90000);
        }
        
        const codeInput = document.getElementById('tmGroupOrderCode');
        if (codeInput) codeInput.value = currentCartCode;

        const displayCode = document.getElementById('tmGroupDisplayCode');
        if (displayCode) displayCode.textContent = '#' + currentCartCode;

        const refText = document.getElementById('tmCartRefText');
        if (refText) refText.textContent = '#' + currentCartCode;

        window.renderTMCart();

        const modal = document.getElementById('tmCartModal');
        if (modal) modal.classList.remove('hidden');
    };

    window.closeTMCartModal = function() {
        window.stopCartPaymentPolling();
        const modal = document.getElementById('tmCartModal');
        if (modal) modal.classList.add('hidden');
    };

    window.toggleCartKHQR = async function(show) {
        const section = document.getElementById('tmCartKhqrSection');
        if (!section) return;

        if (show) {
            section.classList.remove('hidden');
            const cart = window.getTMCart();
            const totalPrice = cart.reduce((sum, item) => sum + ((parseFloat(item.price) || 0) * (parseInt(item.quantity) || 1)), 0);

            if (totalPrice <= 0) {
                return;
            }

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                  document.querySelector('#tmGroupOrderForm input[name="_token"]')?.value;
                const nameVal = document.querySelector('#tmGroupOrderForm input[name="customer_name"]')?.value || '';
                const phoneVal = document.querySelector('#tmGroupOrderForm input[name="customer_phone"]')?.value || '';

                const res = await fetch('/teaching-materials/init-group-order', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        order_code: currentCartCode,
                        cart_items: cart,
                        customer_name: nameVal,
                        customer_phone: phoneVal
                    })
                });

                const data = await res.json();
                if (data && data.success) {
                    currentCartCode = data.order_code;
                    
                    const codeInput = document.getElementById('tmGroupOrderCode');
                    if (codeInput) codeInput.value = currentCartCode;

                    const displayCode = document.getElementById('tmGroupDisplayCode');
                    if (displayCode) displayCode.textContent = '#' + currentCartCode;

                    const refText = document.getElementById('tmCartRefText');
                    if (refText) refText.textContent = '#' + currentCartCode;

                    if (typeof window.generateKHQR === 'function') {
                        await window.generateKHQR('tmCartKHQRCanvas', data.total_price, 'កញ្ចប់សម្ភារៈបង្រៀន', currentCartCode);
                    }

                    window.startCartPaymentPolling(currentCartCode);
                } else if (typeof window.generateKHQR === 'function') {
                    window.generateKHQR('tmCartKHQRCanvas', totalPrice, 'កញ្ចប់សម្ភារៈបង្រៀន', currentCartCode);
                    window.startCartPaymentPolling(currentCartCode);
                }
            } catch (err) {
                console.error('Error in init-group-order:', err);
                if (typeof window.generateKHQR === 'function') {
                    window.generateKHQR('tmCartKHQRCanvas', totalPrice, 'កញ្ចប់សម្ភារៈបង្រៀន', currentCartCode);
                    window.startCartPaymentPolling(currentCartCode);
                }
            }
        } else {
            section.classList.add('hidden');
            window.stopCartPaymentPolling();
        }
    };

    window.handleCartReceiptPreview = function(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('tmCartReceiptPreviewImg');
                if (img) img.src = e.target.result;
                const name = document.getElementById('tmCartReceiptFileName');
                if (name) name.textContent = file.name;
                const size = document.getElementById('tmCartReceiptFileSize');
                if (size) size.textContent = (file.size / 1024).toFixed(1) + ' KB';

                document.getElementById('tmCartReceiptEmptyState')?.classList.add('hidden');
                document.getElementById('tmCartReceiptPreviewState')?.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    };

    window.removeCartReceiptFile = function(e) {
        if (e) e.stopPropagation();
        const input = document.getElementById('tmCartPaymentReceiptInput');
        if (input) input.value = '';
        const img = document.getElementById('tmCartReceiptPreviewImg');
        if (img) img.src = '';
        document.getElementById('tmCartReceiptEmptyState')?.classList.remove('hidden');
        document.getElementById('tmCartReceiptPreviewState')?.classList.add('hidden');
    };

    // Close on Escape & Backdrop
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            window.closeTMCartModal();
        }
    });

    document.getElementById('tmCartModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            window.closeTMCartModal();
        }
    });

    // Form submit listener: clear local cart when order successfully submits
    const orderForm = document.getElementById('tmGroupOrderForm');
    if (orderForm) {
        orderForm.addEventListener('submit', function() {
            // When user submits order, clear local cart after slight delay so page redirect loads clean cart
            setTimeout(() => {
                localStorage.removeItem(CART_STORAGE_KEY);
                window.updateTMCartBadges();
            }, 500);
        });
    }

    // Init on load
    document.addEventListener('DOMContentLoaded', function() {
        window.updateTMCartBadges();
    });
    // In case DOMContentLoaded already fired
    window.updateTMCartBadges();
})();
</script>
