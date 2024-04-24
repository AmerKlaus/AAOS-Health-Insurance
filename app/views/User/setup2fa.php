<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <style>
        /* Custom CSS for wrapping text into two lines */
        .twofa-page p {
            max-width: 400px; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the paragraph */
        }
    </style>
</head>
<body class="twofa-page d-flex align-items-center justify-content-center">
    <div class="text-center">
        <img height="300" width="300" src="<?php echo $data['QRCode'];?>" class="mb-4">
        <p>Scan the above QR-code with your mobile Authenticator app, such as Google Authenticator. The authenticator app will generate codes that are valid for 30 seconds only. Enter such a code and submit it while it is still valid to apply the 2-factor authentication protection to your account.</p>
        <form method="post" action="" class="login-form">
            <label>Current code:<input type="text" name="totp"></label>
            <input type="submit" name="action" value="Verify code" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
