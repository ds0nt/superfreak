<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SuperFreak</title>
</head>
<body>
    <?php echo $username ?>
    <pre>
        <?php echo print_r(json_decode($data)); ?>
    </pre>
</body>
</html>