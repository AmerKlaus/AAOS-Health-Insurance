<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo _("Forgot password"); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1><?php echo _("AAOS Insurance"); ?></h1>
        </div>
    </header>
    <div class="container">
        <form action="/User/forgotPassword" method="post" class="forgot-password-form">
            <h2><?php echo _("Forgot Password"); ?></h2>
            <p><?php echo _("Please enter your email address below to reset your password."); ?></p>
            <label for="email"><?php echo _("Email:"); ?></label>
            <input type="email" id="email" name="email" required>
            <button type="submit"><?php echo _("Reset Password"); ?></button>
            <button type="submit" id="backToLogin"><?php echo _("Back"); ?></button>
            <br><br>
        </form>
    </div>
    <footer>
        <div class="container">
            <h2><?php echo _("Contact Us"); ?></h2>
            <p><?php echo _("If you have any questions or need assistance, our support team is here to help."); ?></p>
            <p><?php echo _("Email:"); ?> <a href="mailto:aaos.coo@gmail.com">aaos.coo@gmail.com</a></p>
            <p><?php echo _("Phone: 1-800-555-1234"); ?></p>
            <p>&copy; 2024 <?php echo _("AAOS Insurance. All rights reserved."); ?></p>
        </div>
    </footer>

    <!-- since its an href styling would need to be done with javascript (easier) -->
    <script>
        document.getElementById("backToLogin").addEventListener("click", function() {
            window.location.href = "/User/login";
        });
    </script>
</body>
</html>
