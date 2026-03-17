<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduCore — Student Management System</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg: #080c14;
            --surface: #0d1321;
            --surface2: #111827;
            --border: rgba(99, 179, 237, 0.12);
            --accent: #38bdf8;
            --accent2: #818cf8;
            --accent3: #34d399;
            --text: #e2e8f0;
            --muted: #64748b;
            --glow: rgba(56, 189, 248, 0.15);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, .font-display {
            font-family: 'Syne', sans-serif;
        }

        /* ── Noise texture overlay ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
            opacity: 0.4;
        }

        /* ── Gradient mesh background ── */
        .mesh-bg {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }
        .mesh-bg span {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.18;
        }
        .mesh-bg span:nth-child(1) { width: 600px; height: 600px; background: #38bdf8; top: -200px; left: -100px; animation: drift1 20s ease-in-out infinite alternate; }
        .mesh-bg span:nth-child(2) { width: 500px; height: 500px; background: #818cf8; bottom: -100px; right: -100px; animation: drift2 25s ease-in-out infinite alternate; }
        .mesh-bg span:nth-child(3) { width: 400px; height: 400px; background: #34d399; top: 40%; left: 50%; animation: drift3 18s ease-in-out infinite alternate; }

        @keyframes drift1 { to { transform: translate(80px, 60px); } }
        @keyframes drift2 { to { transform: translate(-60px, -80px); } }
        @keyframes drift3 { to { transform: translate(-80px, 40px); } }

        /* ── NAV ── */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 2.5rem;
            background: rgba(8, 12, 20, 0.7);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.4rem;
            letter-spacing: -0.03em;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .nav-logo .dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 12px var(--accent);
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: 0.4; } }

        .nav-links { display: flex; align-items: center; gap: 1rem; }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.55rem 1.25rem;
            border-radius: 8px;
            font-family: 'Syne', sans-serif;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            border: none;
        }
        .btn-ghost {
            color: var(--muted);
            background: transparent;
        }
        .btn-ghost:hover { color: var(--text); background: rgba(255,255,255,0.05); }

        .btn-outline {
            color: var(--accent);
            background: transparent;
            border: 1px solid rgba(56, 189, 248, 0.35);
        }
        .btn-outline:hover {
            background: rgba(56, 189, 248, 0.08);
            border-color: var(--accent);
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.15);
        }

        .btn-primary {
            color: #080c14;
            background: var(--accent);
            font-weight: 700;
        }
        .btn-primary:hover {
            background: #7dd3fc;
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(56, 189, 248, 0.35);
        }

        .btn-lg {
            padding: 0.85rem 2rem;
            font-size: 1rem;
            border-radius: 10px;
        }

        /* ── HERO ── */
        .hero {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 8rem 2rem 5rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(56, 189, 248, 0.08);
            border: 1px solid rgba(56, 189, 248, 0.2);
            color: var(--accent);
            padding: 0.35rem 1rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 2rem;
            animation: fadeUp 0.6s ease both;
        }

        .hero h1 {
            font-size: clamp(3rem, 7vw, 6rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.04em;
            color: #fff;
            max-width: 900px;
            animation: fadeUp 0.6s 0.1s ease both;
        }

        .hero h1 .gradient-text {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent2) 60%, var(--accent3) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--muted);
            max-width: 560px;
            line-height: 1.7;
            margin: 1.5rem auto 2.5rem;
            animation: fadeUp 0.6s 0.2s ease both;
            font-weight: 300;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeUp 0.6s 0.3s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── STATS BAR ── */
        .stats-bar {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            gap: 0;
            flex-wrap: wrap;
            max-width: 700px;
            margin: 0 auto 5rem;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            background: rgba(13, 19, 33, 0.8);
            backdrop-filter: blur(12px);
            animation: fadeUp 0.6s 0.4s ease both;
        }
        .stat {
            flex: 1;
            min-width: 140px;
            padding: 1.5rem 2rem;
            text-align: center;
            border-right: 1px solid var(--border);
        }
        .stat:last-child { border-right: none; }
        .stat-num {
            font-family: 'Syne', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
        }
        .stat-num span { color: var(--accent); }
        .stat-label { font-size: 0.8rem; color: var(--muted); margin-top: 0.25rem; letter-spacing: 0.05em; text-transform: uppercase; }

        /* ── FEATURES ── */
        .section {
            position: relative;
            z-index: 1;
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--accent);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        .section-label::before {
            content: '';
            display: block;
            width: 24px;
            height: 2px;
            background: var(--accent);
            border-radius: 2px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #fff;
            line-height: 1.15;
            margin-bottom: 1rem;
        }

        .section-sub {
            color: var(--muted);
            font-size: 1.05rem;
            max-width: 500px;
            line-height: 1.7;
            font-weight: 300;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.25rem;
            margin-top: 3.5rem;
        }

        .feature-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--card-accent, var(--accent)), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .feature-card:hover {
            border-color: rgba(56, 189, 248, 0.25);
            transform: translateY(-4px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4), 0 0 0 1px rgba(56, 189, 248, 0.08);
        }
        .feature-card:hover::before { opacity: 1; }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1.25rem;
        }

        .feature-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.6rem;
        }
        .feature-card p {
            font-size: 0.9rem;
            color: var(--muted);
            line-height: 1.65;
        }

        /* ── HOW IT WORKS ── */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 2rem;
            margin-top: 3.5rem;
            position: relative;
        }

        .step {
            text-align: center;
        }
        .step-num {
            width: 56px; height: 56px;
            border-radius: 50%;
            border: 2px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--accent);
            margin: 0 auto 1.25rem;
            background: var(--surface);
            position: relative;
        }
        .step-num::after {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 1px dashed rgba(56, 189, 248, 0.15);
        }
        .step h3 { font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem; }
        .step p { font-size: 0.875rem; color: var(--muted); line-height: 1.65; }

        /* ── CTA ── */
        .cta-section {
            position: relative;
            z-index: 1;
            margin: 0 2rem 6rem;
            border-radius: 24px;
            padding: 5rem 2rem;
            text-align: center;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.08) 0%, rgba(129, 140, 248, 0.08) 100%);
            border: 1px solid rgba(56, 189, 248, 0.15);
        }
        .cta-section::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 600px; height: 300px;
            background: radial-gradient(ellipse, rgba(56,189,248,0.12) 0%, transparent 70%);
            pointer-events: none;
        }
        .cta-section h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #fff;
            margin-bottom: 1rem;
        }
        .cta-section p {
            color: var(--muted);
            margin-bottom: 2.5rem;
            font-size: 1.05rem;
            font-weight: 300;
        }

        /* ── FOOTER ── */
        footer {
            position: relative;
            z-index: 1;
            border-top: 1px solid var(--border);
            padding: 2rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }
        footer p { color: var(--muted); font-size: 0.85rem; }
        footer a { color: var(--muted); text-decoration: none; font-size: 0.85rem; }
        footer a:hover { color: var(--accent); }

        /* Divider */
        .divider {
            position: relative;
            z-index: 1;
            height: 1px;
            background: var(--border);
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

{{-- Gradient mesh --}}
<div class="mesh-bg">
    <span></span><span></span><span></span>
</div>

{{-- ── NAV ── --}}
<nav>
    <a href="/" class="nav-logo">
        <div class="dot"></div>
        EduCore
    </a>

    <div class="nav-links">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-ghost">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                Dashboard
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" class="btn btn-outline">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-ghost">Sign In</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
            @endif
        @endauth
    </div>
</nav>

{{-- ── HERO ── --}}
<section class="hero">
    <div class="badge">
        <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor"><circle cx="6" cy="6" r="6"/></svg>
        Student Management System
    </div>

    <h1>
        Manage Students<br>
        <span class="gradient-text">Smarter & Faster</span>
    </h1>

    <p>
        A modern platform to track enrollments, manage courses, and monitor student progress — all from one elegant dashboard.
    </p>

    <div class="hero-actions">
        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">
                Go to Dashboard
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        @else
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                Start for Free
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline btn-lg">Sign In</a>
        @endauth
    </div>
</section>

{{-- ── STATS ── --}}
<div class="stats-bar" style="position:relative;z-index:1;">
    <div class="stat">
        <div class="stat-num">12<span>K+</span></div>
        <div class="stat-label">Students</div>
    </div>
    <div class="stat">
        <div class="stat-num">340<span>+</span></div>
        <div class="stat-label">Courses</div>
    </div>
    <div class="stat">
        <div class="stat-num">98<span>%</span></div>
        <div class="stat-label">Satisfaction</div>
    </div>
    <div class="stat">
        <div class="stat-num">24<span>/7</span></div>
        <div class="stat-label">Support</div>
    </div>
</div>

<div class="divider"></div>

{{-- ── FEATURES ── --}}
<section class="section">
    <div class="section-label">Features</div>
    <h2 class="section-title">Everything you need<br>in one place</h2>
    <p class="section-sub">Purpose-built tools to streamline every aspect of student management at your institution.</p>

    <div class="features-grid">
        <div class="feature-card" style="--card-accent: #38bdf8;">
            <div class="feature-icon" style="background:rgba(56,189,248,0.1); color:#38bdf8;">
                👥
            </div>
            <h3>Student Profiles</h3>
            <p>Maintain detailed student records including personal info, enrollment history, and academic progress in one unified view.</p>
        </div>

        <div class="feature-card" style="--card-accent: #818cf8;">
            <div class="feature-icon" style="background:rgba(129,140,248,0.1); color:#818cf8;">
                📚
            </div>
            <h3>Course Management</h3>
            <p>Create, edit and assign courses with ease. Track enrollments and manage schedules without the spreadsheet chaos.</p>
        </div>

        <div class="feature-card" style="--card-accent: #34d399;">
            <div class="feature-icon" style="background:rgba(52,211,153,0.1); color:#34d399;">
                📊
            </div>
            <h3>Analytics Dashboard</h3>
            <p>Get a real-time overview of student metrics, enrollment trends, and performance data with beautiful visual reports.</p>
        </div>

        <div class="feature-card" style="--card-accent: #fb923c;">
            <div class="feature-icon" style="background:rgba(251,146,60,0.1); color:#fb923c;">
                🔔
            </div>
            <h3>Smart Notifications</h3>
            <p>Automated alerts for new enrollments, deadlines, and important events — so nothing ever slips through the cracks.</p>
        </div>

        <div class="feature-card" style="--card-accent: #f472b6;">
            <div class="feature-icon" style="background:rgba(244,114,182,0.1); color:#f472b6;">
                🔒
            </div>
            <h3>Role-Based Access</h3>
            <p>Granular permissions for admins, teachers, and staff. Everyone sees exactly what they need and nothing more.</p>
        </div>

        <div class="feature-card" style="--card-accent: #a78bfa;">
            <div class="feature-icon" style="background:rgba(167,139,250,0.1); color:#a78bfa;">
                📤
            </div>
            <h3>Export & Reports</h3>
            <p>Generate and export comprehensive reports in multiple formats. Present data to stakeholders with confidence.</p>
        </div>
    </div>
</section>

<div class="divider"></div>

{{-- ── HOW IT WORKS ── --}}
<section class="section">
    <div class="section-label">How It Works</div>
    <h2 class="section-title">Up and running<br>in minutes</h2>
    <p class="section-sub">No complex setup. Just a clean, intuitive flow that gets your institution organized fast.</p>

    <div class="steps-grid">
        <div class="step">
            <div class="step-num">01</div>
            <h3>Create Your Account</h3>
            <p>Register in seconds. Set up your institution profile and invite your team.</p>
        </div>
        <div class="step">
            <div class="step-num">02</div>
            <h3>Add Courses</h3>
            <p>Define your curriculum. Add course details, schedules, and assign instructors.</p>
        </div>
        <div class="step">
            <div class="step-num">03</div>
            <h3>Enroll Students</h3>
            <p>Import or manually add students. Assign them to courses with just a few clicks.</p>
        </div>
        <div class="step">
            <div class="step-num">04</div>
            <h3>Track & Manage</h3>
            <p>Monitor progress, generate reports, and keep everything on track from your dashboard.</p>
        </div>
    </div>
</section>

{{-- ── CTA ── --}}
<div style="position:relative;z-index:1;">
    <div class="cta-section">
        <h2>Ready to get started?</h2>
        <p>Join thousands of institutions managing students the modern way.</p>
        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">Open Dashboard →</a>
        @else
            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Create Free Account</a>
                <a href="{{ route('login') }}" class="btn btn-outline btn-lg">Sign In</a>
            </div>
        @endauth
    </div>
</div>

{{-- ── FOOTER ── --}}
<footer>
    <a href="/" class="nav-logo" style="font-size:1.1rem;">
        <div class="dot"></div>
        EduCore
    </a>
    <p>© {{ date('Y') }} EduCore. All rights reserved.</p>
    <div style="display:flex;gap:1.5rem;">
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
        <a href="#">Contact</a>
    </div>
</footer>

</body>
</html>
