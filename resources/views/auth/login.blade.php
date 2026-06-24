<x-guest-layout>
<div class="hero">
    <div class="hero-inner">
        <span class="hero-ornament">&#9769; &nbsp; Parish Account &nbsp; &#9769;</span>
        <h2>Welcome Back</h2>
        <div class="divider"></div>
        <p>Sign in to your Most Holy Name of Jesus Parish account</p>
    </div>
</div>

<div class="auth-wrap">
    <div class="auth-box">
        @if (session('status'))
            <div class="auth-success">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="auth-error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
            <button type="submit" class="btn" style="width:100%;margin:0">Sign In</button>
        </form>
        <p class="auth-switch">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
    </div>
</div>
</x-guest-layout>
