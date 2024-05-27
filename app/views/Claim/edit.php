<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Home"); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap JS -->
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
    <nav>
        <div class="container">
            <ul>
                <li><a href="/Home/index"><?php echo __("Home"); ?></a></li>
                <li><a href="/ProfileController/index"><?php echo __("Profile"); ?></a></li>
                <li><a href="/Claim/claimSubmission"><?php echo __("Claim Submission"); ?></a></li>
                <li><a href="/Claim/claimHistory"><?php echo __("Claim History"); ?></a></li>
                <li><a href="/User/notification"><?php echo __("Notifications"); ?></a></li>
                <li><a href="/Home/customerSupport"><?php echo __("Customer Support"); ?></a></li>
                <li><a href="/Home/loginSelection"><?php echo __("Go to Login/Register"); ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <section id="claim-details">
            <h2><?php echo __("Claim Details"); ?></h2>

            <form action="" method="POST" class="claim-form">
                <label for="claim_type"><?php echo __("Claim Type:"); ?></label>
                <select id="claim_type" class="form-control" name="claim_type" required>
                    <option value="health"><?php echo __("Health"); ?></option>
                </select>

                <label for="claim_details"><?php echo __("Claim Details:"); ?></label>
                <textarea id="claim_details" class="form-control" name="claim_details" rows="4"
                    required><?php echo $data['claim']->claim_details; ?></textarea>

                <label for="claim_date"><?php echo __("Claim Date:"); ?></label>
                <input type="datetime-local" class="form-control" id="claim_date" name="claim_date" required>

                <label for="health_card_number"><?php echo __("Health Insurance Card Number:"); ?></label>
                <input type="text" class="form-control" id="health_card_number" name="health_card_number"
                    class="health-card-input" required value= <?php echo $data['claim']->health_insurance_number; ?>>

                <button type="submit"><?php echo __("Submit Claim"); ?></button>
            </form>
            <div class="back-button">
                <a href="/Home/index"><?php echo __("Back to Dashboard"); ?></a>
            </div>
        </section>
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
