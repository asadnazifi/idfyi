@if (session('error') || session('success') || session('warning') || $errors->any())
    @php
        $type = session('error') ? 'error' : (session('warning') ? 'warning' : 'success');
        $message = session('error') ?? session('warning') ?? session('success') ?? $errors->first();
    @endphp

    <div id="toast" class="toast toast-{{ $type }} BYekan">
        <div class="toast-content">
            <span class="toast-message">{{ $message }}</span>
        </div>
        <div class="toast-progress"></div>
    </div>

    <script>
        const toast = document.getElementById('toast');
        setTimeout(() => toast.classList.add('show'), 100);
        setTimeout(() => toast.classList.remove('show'), 5000);
        setTimeout(() => toast.remove(), 5500);
    </script>

    <style>
        /* پایه‌ی کلی Toast */
        .toast {
            position: fixed;
            top: 30px;
            right: 30px;
            min-width: 280px;
            color: #ffffff;
            border-radius: 8px;
            padding: 14px 20px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: space-between;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.4s ease;
            overflow: hidden;
            z-index: 9999;
        }
        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* حالت‌ها */
        .toast-success {
            background-color: #4CAF50; /* سبز */
        }
        .toast-warning {
            background-color: #2196F3; /* آبی */
        }
        .toast-error {
            background-color: #F44336; /* قرمز */
        }

        /* خط پیشرفت */
        .toast-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            animation: progress-line 5s linear forwards;
            width: 100%;
            opacity: 0.8;
        }

        .toast-success .toast-progress { background-color: #66BB6A; } /* سبز روشن‌تر */
        .toast-warning .toast-progress { background-color: #64B5F6; } /* آبی روشن‌تر */
        .toast-error .toast-progress { background-color: #E57373; }   /* قرمز روشن‌تر */

        @keyframes progress-line {
            from { width: 100%; }
            to { width: 0%; }
        }
    </style>
@endif
