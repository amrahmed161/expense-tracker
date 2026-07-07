<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>

    <!-- AdminLTE CSS -->
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

        .hero-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 50px 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.3);
        }

        .hero-icon {
            font-size: 70px;
            color: #00d2ff;
            margin-bottom: 20px;
            display: block;
        }

        .hero-title {
            color: #ffffff;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hero-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
            margin-bottom: 40px;
        }

        .btn-login {
            background: linear-gradient(135deg, #00d2ff, #0072ff);
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 14px 40px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 114, 255, 0.4);
            color: #fff;
        }

        .btn-register {
            background: transparent;
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            padding: 14px 40px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
        }

        .btn-register:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.6);
            color: #fff;
            transform: translateY(-2px);
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 40px;
        }

        .feature-item {
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .feature-item i {
            font-size: 24px;
            color: #00d2ff;
        }

        .divider {
            color: rgba(255, 255, 255, 0.2);
            margin: 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.15);
        }
    </style>
</head>
<body>

<div class="hero-card">

    {{-- Icon & Title --}}
    <i class="fas fa-wallet hero-icon"></i>
    <h1 class="hero-title">Expense Tracker</h1>
    <p class="hero-subtitle">تحكم في مصروفاتك بشكل احترافي</p>

    {{-- Features --}}
    <div class="features">
        <div class="feature-item">
            <i class="fas fa-chart-pie"></i>
            <span>إحصائيات</span>
        </div>
        <div class="feature-item">
            <i class="fas fa-tags"></i>
            <span>فئات</span>
        </div>
        <div class="feature-item">
            <i class="fas fa-history"></i>
            <span>سجل كامل</span>
        </div>
    </div>

    {{-- Buttons --}}
    <a href="{{ route('login') }}" class="btn-login">
        <i class="fas fa-sign-in-alt me-2"></i> تسجيل الدخول
    </a>

    <div class="divider">أو</div>

    <a href="{{ route('register') }}" class="btn-register">
        <i class="fas fa-user-plus me-2"></i> إنشاء حساب جديد
    </a>

</div>

<!-- AdminLTE JS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
