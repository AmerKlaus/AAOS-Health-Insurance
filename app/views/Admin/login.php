<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Admin Login"); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div class="container">
            <h1><?php echo __("AAOS Insurance"); ?></h1>
        </div>
    </header>
    <div class="container">
        <form action="/Admin/login" method="post" class="login-form">
            <h2><?php echo __("Admin Login"); ?></h2>
            <input type="text" name="username" placeholder="<?php echo __("Username"); ?>" required>
            <input type="password" name="password" placeholder="<?php echo __("Password"); ?>" required> <br> </br>
            <button type="submit"><?php echo __("Login"); ?></button>
        </form>
    </div>
</body>

</html>
