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
        <form action="/User/register" method="post" class="register-form" onsubmit="return validateForm()">
            <h2><?= __('User Register') ?></h2>
            <label for="full_name"><?= __('Full Name') ?>:</label>
            <input type="text" id="full_name" name="full_name" required>
            <label for="username"><?= __('Username') ?>:</label>
            <input type="text" id="username" name="username" required>
            <label for="email"><?= __('Email') ?>:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone"><?= __('Phone') ?>:</label>
            <input type="tel" id="phone" name="phone" pattern="\d{3}-\d{3}-\d{4}" required
                title="<?= __('Please enter a phone number in the format XXX-XXX-XXXX.') ?>">
            <label for="address"><?= __('Address') ?>:</label>
            <input type="text" id="address" name="address" required>
            <label for="password"><?= __('Password') ?>:</label>
            <input type="password" id="password" name="password" required>
            <small id="passwordHelp"
                class="form-text text-muted"><?= __('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.') ?></small>
            <label for="confirm_password"><?= __('Confirm Password') ?>:</label>
            <input type="password" id="confirm_password" name="confirm_password" required> <br> </br>

            <button type="submit"><?= __('Register') ?></button>
        </form>
    </div>
    <footer>
        <div class="container">
            <h2><?php echo __("Contact Us"); ?></h2>
            <p><?php echo __("If you have any questions or need assistance, our support team is here to help."); ?>
            </p>
            <p><?php echo __("Email"); ?>: <a href="mailto:aaos.coo@gmail.com">aaos.coo@gmail.com</a></p>
            <p><?php echo __("Phone"); ?>: 1-800-555-1234</p>
            <p>&copy; 2024 <?php echo __("AAOS Insurance"); ?>. <?php echo __("All rights reserved."); ?></p>

            <!-- Language change form -->
            <form id="language-form">
                <label><?php echo __("Select Language:"); ?></label>
                <input type="radio" id="lang-en" name="language" value="en" checked>
                <label for="lang-en">English</label>
                <input type="radio" id="lang-fr" name="language" value="fr">
                <label for="lang-fr">French</label>
                <button type="button" onclick="changeLanguage()"><?php echo __("Change Language"); ?></button>
            </form>
        </div>
    </footer>
    <script>
        document.getElementById("password").addEventListener("input", function () {
            var password = document.getElementById("password").value;
            var passwordHelp = document.getElementById("passwordHelp");
            var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;

            if (strongRegex.test(password)) {
                passwordHelp.innerHTML = "<?php echo __('Strong password'); ?>";
                passwordHelp.classList.remove("text-danger");
                passwordHelp.classList.add("text-success");
            } else {
                passwordHelp.innerHTML = "<?php echo __('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.'); ?>";
                passwordHelp.classList.remove("text-success");
                passwordHelp.classList.add("text-danger");
            }
        });

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