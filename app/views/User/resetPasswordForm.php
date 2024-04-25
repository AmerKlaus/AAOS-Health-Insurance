<!-- reset-password-form.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form action="/User/resetPassword" method="POST">
        <label for="new-password">New Password:</label>
        <input type="password" id="new-password" name="new_password" required><br>
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm_password" required><br>
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>"> 
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
