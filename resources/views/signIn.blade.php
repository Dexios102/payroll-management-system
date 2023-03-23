<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>BFAR - Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
</head>
<body>
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="images/logo.png" alt="logo">
            </div>
            <div class="login-card-header">
             
                    {{-- {{$name}}
                {{$type}}
                --}}
                <h1>Sign In</h1>
                <div>Please login to use the platform</div>
            </div>
            <form action="/loginUser" method="post" class="login-card-form" >
                @csrf
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" placeholder="Enter Email" id="emailForm" name="email"
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Enter Password" id="passwordForm" name="password"
                    autofocus required>
                </div>
                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheckbox" checked>
                        <label for="rememberMeCheckbox">Remember Me</label>
                    </div>
                    <a href="/forgotPass">I forgot my password</a>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <div class="login-card-footer">
                Don't have an account? <a href="/signup">Create an account.</a>
            </div>
        </div>
</body>
</html>