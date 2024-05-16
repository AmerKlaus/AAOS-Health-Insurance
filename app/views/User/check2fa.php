<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($_COOKIE['lang'] ?? 'en'); ?>">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo _("Verify 2FA"); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>


<body>
    <p><?php echo __("Submit the 6-digit code for this site from your Authenticator app."); ?></p>
    <form method="post" action="">
        <label><?php echo __("Current code:"); ?><input type="text" name="totp" /></label>
        <input type="submit" name="action" value="<?php echo __("Verify code"); ?>" />
    </form>
</body>

</html>
