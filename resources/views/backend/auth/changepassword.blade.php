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
            @if (session('error'))
                <div class="alert alert-success" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form class="login-form" action='{{ route("changepassword.update")}}' method='POST'>
                {{ csrf_field() }}
                <div class="app-form">
                    <div class="app-form-group">
                        <input type="password" class="app-form-control" name="old_password" placeholder="Old Password">
                        <span style="color:white;"></span>
                    </div>
                    <div class="app-form-group">
                        <input type="password" class="app-form-control" name="new_password" placeholder="New Password">
                        <span style="color:white;"></span>
                    </div>
                    <div class="app-form-group">
                        <input type="password" class="app-form-control" name="confirm_password" placeholder="Confirm Password">
                        <span style="color:white;"></span>
                    </div>
                    <button type="submit" id="submit-login" class="app-form-button">Change Passoword</button><br>
                </div>
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
</body>

</html>