<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
    <link rel="stylesheet" href="css/register.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
</head>
<body>
    <div class="register-card-container">
        <div class="register-card">
            <div class="card-logo">
                <img src="images/logo.png" alt="logo">
            </div>
            <div class="register-card-header">
                <h1>Sign Up</h1>
                <div>Please fill up your infomation to continue</div>
            </div>
            <form action="/registerUser" method="post" class="register-card-form">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">Badge</span>
                    <input type="text" placeholder="Username" id="emailForm" name="email"
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">Email</span>
                    <input type="text" placeholder="example@gmail.com" id="emailForm" name="email"
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">Lock</span>
                    <input type="password" placeholder="Password" id="emailForm" name="email"
                    autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">Key</span>
                    <input type="password" placeholder="Confirm password" id="emailForm" name="email"
                    autofocus required>
                </div>
                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheckbox" checked>
                        <label for="rememberMeCheckbox">Remember Me</label>
                    </div>
                </div>
                <button type="submit">Sign Up</button>
            </form>
            <div class="register-card-footer">
                Already have an account ? <a href="/">Login here.</a>
            </div>
        </div>
    </div>
</body>
</html>