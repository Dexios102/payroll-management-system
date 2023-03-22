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
        <!-- <div class="login-card-social">
            <div>Other Sign-In Options</div>
            <div class="login-card-social-btns">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div> -->
</body>
</html>