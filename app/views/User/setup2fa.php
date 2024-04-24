<!DOCTYPE html>
<html>
<head>
    <title>2FA Setup</title>
</head>
<body>
    <img height="300" width="300" src="<?php echo $data['QRCode'];?>">
    <p>Scan the above QR-code with your mobile Authenticator app, such as Google Authenticator. The authenticator app will generate codes that are valid for 30 seconds only. Enter such a code and submit it while it is still valid to apply the 2-factor authentication protection to your account.</p>
    <form method="post" action="">
        <label>Current code:<input type="text" name="totp" /></label>
        <input type="submit" name="action" value="Verify code" />
    </form>
</body>
</html>
