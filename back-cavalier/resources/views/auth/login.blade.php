<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

<div class="containerr">
    <a href="{{ route('frentOffice.home') }}" class="flex-containerr">
        <img src="{{ asset('styyle/img/tbourida-4.png') }}" alt="logo" class="rounded-circle" width="80" />
        <h2 class="titlee">Le Cavalier</h2>
    </a>
</div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('signup') }}" method="POST">
                @csrf
                <h1>Create Account</h1>

                <div class="input-container">
                    <input type="text" name="first_name" placeholder="First Name" />
                    @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <input type="text" name="last_name" placeholder="Last Name" />
                    @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <input type="text" name="phone" placeholder="Phone" />
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <input type="email" name="email" placeholder="Email" />
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <input type="password" name="password" placeholder="Password" />
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('signin') }}" method="POST">
                @csrf
                <h1>Sign in</h1>

                <div class="input-container">
                    <input type="email" name="email" placeholder="Email" />
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                    <input type="password" name="password" placeholder="Password" />
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <a href="{{ route('forget.password.get') }}">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
