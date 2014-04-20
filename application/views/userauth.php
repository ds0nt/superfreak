<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SuperFreak</title>
    <link rel="stylesheet" type="text/css" href="../ui/sass/stylesheets/screen.css">

</head>
<body>

    <div class="page">
        <h1>SuperFreak</h1>
        <div id="inner-page">
            <form style="text-align: center;" action="/superfreak/welcome/app_auth_post" method="post">
                <input type="hidden" name="app_token" value="<?php echo $app['token'] ?>">
                <input type="hidden" name="redirect" value="<?php echo $redirect ?>">
                <h3 style="width: 100%; margin-bottom: 0.5em"><b style="font-weight: bold;"><?php echo $app['name'] ?></b> wants to check your measurements!</h3>

                <style type="text/css">
                    form button {
                        margin-top: 1.0em;
                    }
                </style>
                <input class="loginfield" type="text" name="username" placeholder="username">
                <input class="loginfield" type="password" name="password" placeholder="password">
                <button class="btn huge" id="submit" type="submit">Get Measured!</button>
            </form>
        </div>

        <div class="clearme"></div>

    </div>

    <script type="text/javascript" src="../ui/js/zepto.js"></script>
</body>
</html>