<x-guest-layout>
<div class="hero">
    <div class="hero-inner">
        <span class="hero-ornament">&#9769; &nbsp; Parish Account &nbsp; &#9769;</span>
        <h2>Create Account</h2>
        <div class="divider"></div>
        <p>Join the Most Holy Name of Jesus Parish community</p>
    </div>
</div>

<div class="auth-wrap">
    <div class="auth-box">
        @if ($errors->any())
            <div class="auth-error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Username" required value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password (min. 8 characters)" required autocomplete="new-password">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
            <button type="submit" class="btn" style="width:100%;margin:0">Create Account</button>
        </form>
        <p class="auth-switch">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
    </div>
</div>
</x-guest-layout>
