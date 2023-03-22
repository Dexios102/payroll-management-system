<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>Forgot Password</title>
    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
    <link rel="stylesheet" href="css/forgotPass.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
</head>
<body>
    <div class="forgot-card-container">
        <div class="forgot-card">
            <div class="forgot-card-logo">
                <img src="images/forgotUser.jpg" alt="forgot">
            </div>
            <div class="forgot-header">
                <h1>Password Recovery</h1>
                <div>Enter your email to send your recovery link</div>
            <form action="/forgotPass" class="forgot-card-form">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">Outgoing_Mail</span>
                    <input type="email" placeholder="example@gmail.com" id="emailForm" name="email"
                    autofocus required>
                </div>
                <button type="submit">Reset Account</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>