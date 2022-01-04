<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/login/style.css') }}">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Sign In </h2>
            <h2 class="inactive underlineHover">Sign Up </h2>

            <form class="login-form" action='{{ route("login.login")}}' method='POST'>
                {{ csrf_field() }}
                <div class="app-form">
                    <span id="error" style="color:red;"></span>
                    <div class="app-form-group">
                        <input type="email" class="app-form-control" name="email" placeholder="Email">
                        <span style="color:white;"></span>
                    </div>
                    <div class="app-form-group">
                        <input type="password" class="app-form-control" name="password" placeholder="Password">
                        <span style="color:white;"></span>
                    </div>
                    <button type="submit" id="submit-login" class="app-form-button">Đăng nhập</button><br>

                </div>
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</body>

</html>