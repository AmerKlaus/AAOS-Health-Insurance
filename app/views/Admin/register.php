<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __('Register') ?></title>

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
        <form action="/Admin/registerAdmin" method="post" class="register-form">
            <h2><?= __('Admin Register') ?></h2>
            <label for="username"><?= __('Username') ?>:</label>
            <input type="text" id="username" name="username" required>
            <label for="email"><?= __('Email') ?>:</label>
            <input type="email" id="email" name="email" required>
            <label for="password"><?= __('Password') ?>:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password"><?= __('Confirm Password') ?>:</label>
            <input type="password" id="confirm_password" name="confirm_password" required> <br> </br>
            <button type="submit"><?= __('Register') ?></button>
        </form>
    </div>
    <footer>
        <div class="container">
            <h2><?= __('Contact Us') ?></h2>
            <p><?= __('If you have any questions or need assistance, our support team is here to help.') ?></p>
            <p><?= __('Email') ?>: <a href="mailto:aaos.coo@gmail.com">aaos.coo@gmail.com</a></p>
            <p><?= __('Phone') ?>: 1-800-555-1234</p>
            <p>&copy; <?= __('2024 AAOS Insurance. All rights reserved.') ?></p>
        </div>
    </footer>
</body>

</html>