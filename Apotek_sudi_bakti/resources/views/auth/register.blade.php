<x-guest-layout>
    <style>

        body {
            background: linear-gradient(to left, #41608E, #41B2AB);
        }

        .container {
            display: flex;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            margin-top: 50px;
            padding: 0;
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
            width: 100%;
            border-radius: 100px;
            border: 1px solid #ccc;
            height: 50px;
            text-align: center;
            padding: 0 75px; /* Adjust the padding to increase the width */
            box-sizing: border-box; /* Ensure padding is included in the width */
            margin-bottom: 5px;
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

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none; /* Remove the default focus outline */
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
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border-right: 1px solid white;
            background: linear-gradient(to right, #168F8A, #285A6E);
        }

        .right-side {
            flex: 1;
            justify-content: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border-left: 1px solid white;
            background: linear-gradient(to left, #16376A, #285A6E);
        }

        .hero-text-left {
            color: white;
            font-weight: bold;
            margin-top: 60px;
            margin-bottom: 50px;
            font-size: 1.8em;
        }

        .hero-text-right {
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
            border: 3px solid white;
            border-radius: 30px;
            display: inline-block; /* Change display to inline-block */
            text-align: center; /* Align text center within the block */
            width: auto; /* Adjust width automatically based on content */
            padding: 25px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .link-to-login:hover {
            color: grey;
            background-color: white;
            transition: 0.3s;
        }

        .register-button {
            margin-top: 30px;
            margin-bottom: 40px;
            border: 3px solid white;
            border-radius: 20px;
            background-color: #00988F;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 60px;
            padding-right: 60px;
            transition: 0.3s;
        }

        .register-button:hover {
            background-color: #42608D;
            transition: 0.3s;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-side,
            .right-side {
                width: 100%;
                border: none;
                border-bottom: 1px solid white;
                padding: 20px 0;
                text-align: center;
            }

            .left-side {
                border-: none;
                border-bottom: 1px solid white;
            }

            .right-side {
                border-top: 1px solid white;
                border-bottom: none;
            }

            .form-group input {
                padding: 0 20px;
            }

            .bottom {
                flex-direction: column;
            }

            .link-to-login {
                margin-top: 20px;
            }

            .register-button {
                margin-top: 20px;
                padding: 15px 40px;
            }
        }

    </style>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="container">
            <div class="left-side">
                <div id="home" class="text-center mb-6 hero-section">
                    <h1 class="hero-text-left">SIGN UP</h1>
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
                    <button type="submit" class="register-button">
                        {{ __('SIGN UP') }}
                    </button>
                </div>
            </div>

            <div class="right-side">
                <p class="hero-text-right">Hello!!</p>
                <p class="hero-text-right">Make your account<br>to access more of our features!!</p>
                <a class="link-to-login" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                </a>
            </div>

        </div>

    </form>
</x-guest-layout>