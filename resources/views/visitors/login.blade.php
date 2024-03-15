@extends('visitors.layouts.main')
@section('main-container')
    <style>
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="login-container">
        <form action="{{ route('login_submit') }}" method="POST"
            style="
        width: 59%;
        margin: auto;
        box-shadow: 10px 10px 10px 10px #00000021;
        padding: 20px;
    ">
            <h2>Login</h2>
            @csrf
            <div class="form-group">
                <label for="email">email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
@endsection
