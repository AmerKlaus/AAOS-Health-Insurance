<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('User Login') ?></title>

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
            <h1><?= __('AAOS Insurance') ?></h1>
        </div>
    </header>
    <div class="container">
        <form action="/User/login" method="post" class="login-form">
            <h2><?= __('User Login') ?></h2>
            <?php if (isset($errorMessage)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= __($errorMessage) ?>
                </div>
            <?php endif; ?>
            <label for="username"><?= __('Username') ?>:</label>
            <input type="text" id="username" name="username" required>
            <label for="password"><?= __('Password') ?>:</label>
            <input type="password" id="password" name="password" required> <br> </br>
            <button type="submit"><?= __('Login') ?></button>
            <a href="/User/forgotPassword"><?= __('Forgot Password?') ?></a>
            <p><?= __("Don't have an account?") ?> <a href="/User/register"><?= __('Sign up here') ?></a>.</p>
        </form>
    </div>
</body>

</html>
