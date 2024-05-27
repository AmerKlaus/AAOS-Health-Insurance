<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Submit Claim"); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
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
        <section id="claim-submission">
            <h2><?php echo __("Claim Submission"); ?></h2>
            <form action="/Claim/submitClaim" method="POST" class="claim-form">
                <label for="claim_type"><?php echo __("Claim Type:"); ?></label>
                <select id="claim_type" class="form-control" name="claim_type" required>
                    <option value="health"><?php echo __("Health"); ?></option>
                </select>

                <label for="claim_details"><?php echo __("Claim Details:"); ?></label>
                <textarea id="claim_details" class="form-control" name="claim_details" rows="4"
                    required></textarea>

                <label for="claim_date"><?php echo __("Claim Date:"); ?></label>
                <input type="datetime-local" class="form-control" id="claim_date" name="claim_date" required>

                <label for="health_card_number"><?php echo __("Health Insurance Card Number:"); ?></label>
                <input type="text" class="form-control" id="health_card_number" name="health_card_number"
                    class="health-card-input" required>

                <button type="submit"><?php echo __("Submit Claim"); ?></button>
            </form>


            <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
            <script src="https://mediafiles.botpress.cloud/9d85be25-4f92-441b-a9d8-9eba09ec2430/webchat/config.js"
                defer></script>
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
