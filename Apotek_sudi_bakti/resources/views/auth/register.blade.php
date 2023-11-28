<x-guest-layout>
    <style>

        body {
            background: linear-gradient(to left, #41608E, #41B2AB);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Style for form elements */
        .form-group {
            margin-bottom: 20px;

            justify-content: center;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%; /* Adjust width to fill the container */
            border-radius: 100px;
            border: 1px solid #ccc;
            height: 50px;
            text-align: center;
        }

        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="password"]:hover {
            border: none;
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            background-color: #3498db;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .link-to-login {
            margin-top: 10px;
            display: block;
            text-align: right;
        }

        .left-side {
            flex: 1;
            justify-content: center;
            padding: 20px; /* Add padding for spacing */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center items horizontally */
            text-align: center; /* Center text content */
        }

        .right-side {
            flex: 1;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .hero-text {
            color: white;
            font-weight: bold;
            font-size: 1.5em;
        }

        .bottom {
            display: flex;
            justify-content: space-between;
        }

        .link-to-login {
            margin-top: 10px;
            display: block;
            text-align: center; /* Align text center within the block */
        }
    </style>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="container">
            <div class="left-side">
                <div id="home" class="text-center mb-6 hero-section">
                    <h1 class="hero-text">SIGN UP</h1>
                </div>

                <div class="form-group">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="form-group">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="E-mail">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group">
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="form-group">
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="bottom">
                    <button type="submit">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>

            <div class="right-side">
                <p class="hero-text">Hello!!</p>
                <p class="hero-text">Make your account<br>to access more of our features!!</p>
                <a class="link-to-login" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                </a>
            </div>

        </div>

    </form>
</x-guest-layout>