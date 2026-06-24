<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Most Holy Name of Jesus Parish</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

<div class="sticky-header">
    <div class="topbar">
        &#9769; &nbsp; Deus Caritas Est &mdash; God is Love &nbsp; &#9769;
    </div>
    <div class="nav-bar">
        <nav>
            <div class="nav-brand">
                <img src="{{ asset('images/ParishLogo.png') }}" alt="Parish Logo" class="nav-logo">
                <div class="nav-title">
                    <span class="nav-parish-name">Most Holy Name of Jesus Parish</span>
                    <span class="nav-tagline">Barangay Narra, City of San Pedro, Laguna</span>
                </div>
            </div>
            <button class="menu-toggle" onclick="document.querySelector('.nav-bar nav ul').classList.toggle('open')">&#9776; Menu</button>
            <ul>
                @foreach(['home'=>'Home','about'=>'About Us','mass-schedule'=>'Mass Schedule','sacraments'=>'Sacraments','ministries'=>'Ministries','news'=>'News & Events','flipbook'=>'Coffee Table Book','resources'=>'Resources','donate'=>'Donate','contact'=>'Contact Us'] as $route=>$label)
                <li>
                    <a href="{{ url($route) }}" class="{{ request()->is($route) || ($route==='home' && request()->is('/')) ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="nav-auth">
                @auth
                    @if(auth()->user()->is_admin)
                    <a href="{{ url('admin') }}" class="{{ request()->is('admin*') ? 'active' : '' }} nav-auth-btn">&#9881; Admin</a>
                    @endif
                    <span class="nav-username">&#9769; {{ auth()->user()->username }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button type="submit" class="nav-auth-btn" style="background:none;border:none;cursor:pointer;padding:0;">Sign Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-auth-btn {{ request()->is('login') ? 'active' : '' }}">Login</a>
                    <a href="{{ route('register') }}" class="nav-auth-btn nav-auth-btn--primary {{ request()->is('register') ? 'active' : '' }}">Sign Up</a>
                @endauth
            </div>
        </nav>
    </div>
</div>

<main>
    @yield('content')
</main>

<footer>
    <div class="footer-inner">
        <div class="footer-col">
            <h3>&#9769; Most Holy Name of Jesus Parish</h3>
            <p>Resettlement Area, Brgy. Narra<br>Upper Village, San Pedro City, Laguna 4023</p>
            <p>&#128222; (02) 8868-2255</p>
            <p style="margin-top:12px; color:#9a7a58; font-style:italic; font-size:.85rem;">
                "As for me and my household,<br>we will serve the Lord." — Joshua 24:15
            </p>
        </div>
        <div class="footer-col">
            <h3>&#9749; Mass Schedule</h3>
            <p>Tue – Fri: 5:30 PM</p>
            <p>Saturday: 6:30 AM</p>
            <p>Sunday: 7:00 AM &bull; 6:30 PM</p>
            <p>Monday: No Mass</p>
        </div>
        <div class="footer-col">
            <h3>&#128196; Quick Links</h3>
            <ul>
                <li><a href="{{ url('about') }}">About Us</a></li>
                <li><a href="{{ url('mass-schedule') }}">Mass Schedule</a></li>
                <li><a href="{{ url('sacraments') }}">Sacraments</a></li>
                <li><a href="{{ url('ministries') }}">Ministries</a></li>
                <li><a href="{{ url('news') }}">News &amp; Events</a></li>
                <li><a href="{{ url('donate') }}">Donate</a></li>
                <li><a href="{{ url('contact') }}">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h3>&#128336; Office Hours</h3>
            <p>Tuesday &ndash; Sunday<br>9:00 AM &ndash; 12:00 NN<br>2:00 PM &ndash; 5:00 PM</p>
            <p>Monday &amp; Holidays: Closed</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} &nbsp;&#9769;&nbsp; Most Holy Name of Jesus Parish &nbsp;&#9769;&nbsp; All Rights Reserved</p>
    </div>
</footer>

@stack('scripts')
</body>
</html>
