<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($_COOKIE['lang'] ?? 'en'); ?>">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo _("Forgot password"); ?></title>

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
            <h1><?php echo _("AAOS Insurance"); ?></h1>
        </div>
    </header>
    <div class="container">
        <form action="/User/forgotPassword" method="post" class="forgot-password-form">
            <h2><?php echo __("Forgot Password"); ?></h2>
            <p><?php echo __("Please enter your email address below to reset your password."); ?></p>
            <label for="email"><?php echo __("Email:"); ?></label>
            <input type="email" id="email" name="email" required>
            <button type="submit"><?php echo __("Reset Password"); ?></button>
            <button type="submit" id="backToLogin"><?php echo __("Back"); ?></button>
            <br><br>
        </form>
    </div>

    <script>
        
        document.getElementById("backToLogin").addEventListener("click", function () {
            window.location.href = "/User/login";
        });
    </script>

    <footer>
        <div class="container">
            <h2><?php echo __("Contact Us"); ?></h2>
            <p><?php echo __("If you have any questions or need assistance, our support team is here to help."); ?>
            </p>
            <p><?php echo __("Email"); ?>: <a href="mailto:aaos.coo@gmail.com">aaos.coo@gmail.com</a></p>
            <p><?php echo __("Phone"); ?>: 1-800-555-1234</p>
            <p>&copy; <?php echo date("Y"); ?> <?php echo __("AAOS Insurance"); ?>.
                <?php echo __("All rights reserved."); ?></p>

            <!-- Language change form -->
            <form id="language-form">
                <label><?php echo __("Select Language:"); ?></label>
                <input type="radio" id="lang-en" name="language" value="en" <?php if ($_COOKIE['lang'] ?? 'en' === 'en') {
                    echo 'checked';
                } ?>>
                <label for="lang-en"><?php echo __("English"); ?></label>
                <input type="radio" id="lang-fr" name="language" value="fr" <?php if ($_COOKIE['lang'] ?? 'en' === 'fr') {
                    echo 'checked';
                } ?>>
                <label for="lang-fr"><?php echo __("French"); ?></label>
                <button type="button" onclick="changeLanguage()"><?php echo __("Change Language"); ?></button>
            </form>
        </div>
    </footer>
    <script>
        function changeLanguage() {
            var selectedLanguage;
            if (document.getElementById("lang-en").checked) {
                selectedLanguage = "en";
            } else if (document.getElementById("lang-fr").checked) {
                selectedLanguage = "fr";
            }

            // Modify the URL based on the selected language
            var currentUrl = window.location.href;
            var newUrl;
            if (currentUrl.includes("?")) {
                newUrl = currentUrl.replace(/(lang=)[^\&]+/, '$1' + selectedLanguage);
            } else {
                newUrl = currentUrl + "?lang=" + selectedLanguage;
            }

            // Redirect to the new URL
            window.location.href = newUrl;
        }
    </script>

</body>

</html>