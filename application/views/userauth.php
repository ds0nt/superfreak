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
                <input type="hidden" name="app_token" value="<?php echo $apptoken ?>">
                <input type="hidden" name="redirect" value="<?php echo $redirect ?>">
                <input type="text" name="username">
                <input type="password" name="password">
                <button id="submit" type="submit">Get My Measurements!</button>
            </form>
        </div>
        <ul class="footer-links">
            <li><a href="#" class="home-ln">About</a></li>
            <li><a href="#" class="home-ln">Team</a></li>
            <li><a href="#" class="home-ln">Contact</a></li>
            <li><a href="#" class="api-ln">Api</a></li>
        </ul>
        <div class="clearme"></div>

    </div>

    <script type="text/javascript" src="../ui/js/zepto.js"></script>
</body>
</html>