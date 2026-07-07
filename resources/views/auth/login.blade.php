<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول | Expense Tracker</title>

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Tajawal', sans-serif;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo .icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 28px;
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .login-logo h1 {
            color: white;
            font-size: 22px;
            font-weight: 700;
            margin: 0;
        }

        .login-logo p {
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            margin: 5px 0 0;
        }

        .form-group label {
            color: rgba(255,255,255,0.8);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-control {
            background: rgba(255,255,255,0.08) !important;
            border: 1px solid rgba(255,255,255,0.15) !important;
            border-radius: 10px !important;
            color: white !important;
            padding: 12px 15px !important;
            font-family: 'Tajawal', sans-serif;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.3) !important;
        }

        .form-control:focus {
            border-color: #667eea !important;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2) !important;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Tajawal', sans-serif;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            color: rgba(255,255,255,0.5);
            font-size: 14px;
        }

        .register-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            color: #764ba2;
        }

        .invalid-feedback {
            color: #ff6b6b !important;
            font-size: 12px;
        }

        .input-group-text {
            background: rgba(255,255,255,0.08) !important;
            border: 1px solid rgba(255,255,255,0.15) !important;
            color: rgba(255,255,255,0.5) !important;
        }
    </style>
</head>
<body>

<div class="login-card">

    {{-- Logo --}}
    <div class="login-logo">
        <div class="icon">
            <i class="fas fa-wallet"></i>
        </div>
        <h1>Expense Tracker</h1>
        <p>سجّل دخولك للمتابعة</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="form-group">
            <label><i class="fas fa-envelope ml-1"></i> البريد الإلكتروني</label>
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="example@email.com"
                   autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
            <label><i class="fas fa-lock ml-1"></i> كلمة المرور</label>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="••••••••">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="form-group d-flex justify-content-between align-items-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"
                       id="remember" name="remember">
                <label class="custom-control-label"
                       style="color: rgba(255,255,255,0.6); font-size: 13px;"
                       for="remember">تذكرني</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   style="color: #667eea; font-size: 13px; text-decoration: none;">
                    نسيت كلمة المرور؟
                </a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn-login">
            <i class="fas fa-sign-in-alt ml-2"></i>
            تسجيل الدخول
        </button>

    </form>

    {{-- Register Link --}}
    <div class="register-link">
        ما عندكش حساب؟
        <a href="{{ route('register') }}">إنشاء حساب جديد</a>
    </div>

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
