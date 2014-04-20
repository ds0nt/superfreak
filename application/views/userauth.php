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
            <form action="/superfreak/welcome/app_auth_post" method="post">
                <input type="hidden" name="app_token" value="<?php echo $app['token'] ?>">
                <input type="hidden" name="redirect" value="<?php echo $redirect ?>">
                <h3><b style="font-weight: bold;"><?php echo $app['name'] ?></b> wants to check your measurements!</h3>


                <input style="display: block; height: 3em; width: 100% border: none; margin: 0.5em" type="text" name="username" placeholder="username">
                <input style="display: block; height: 3em; width: 100% border: none; margin: 0.5em" type="password" name="password" placeholder="password">
                <button id="submit" type="submit">Get Measured!</button>
            </form>
        </div>

        <div class="clearme"></div>

    </div>

    <script type="text/javascript" src="../ui/js/zepto.js"></script>
</body>
</html>