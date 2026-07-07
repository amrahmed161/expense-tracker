<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب | Expense Tracker</title>

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
            padding: 20px;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
        }

        .register-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-logo .icon {
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

        .register-logo h1 {
            color: white;
            font-size: 22px;
            font-weight: 700;
            margin: 0;
        }

        .register-logo p {
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

        .btn-register {
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

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: rgba(255,255,255,0.5);
            font-size: 14px;
        }

        .login-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
        }

        .invalid-feedback {
            color: #ff6b6b !important;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="register-card">

    {{-- Logo --}}
    <div class="register-logo">
        <div class="icon">
            <i class="fas fa-user-plus"></i>
        </div>
        <h1>إنشاء حساب جديد</h1>
        <p>انضم وابدأ تتحكم في مصروفاتك</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div class="form-group">
            <label><i class="fas fa-user ml-1"></i> الاسم</label>
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}"
                   placeholder="اسمك الكامل"
                   autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label><i class="fas fa-envelope ml-1"></i> البريد الإلكتروني</label>
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="example@email.com">
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

        {{-- Confirm Password --}}
        <div class="form-group">
            <label><i class="fas fa-lock ml-1"></i> تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation"
                   class="form-control"
                   placeholder="••••••••">
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn-register">
            <i class="fas fa-user-plus ml-2"></i>
            إنشاء الحساب
        </button>

    </form>

    {{-- Login Link --}}
    <div class="login-link">
        عندك حساب بالفعل؟
        <a href="{{ route('login') }}">سجّل دخولك</a>
    </div>

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
