<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Coverage Options - Knowledge Base"); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="container">
            <h1><?php echo __("AAOS Insurance Customer Support"); ?></h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="/Home/index"><?php echo __("Home"); ?></a></li>
                <li><a href="/ProfileController/index"><?php echo __("Profile"); ?></a></li>
                <li><a href="/Claim/claimSubmission"><?php echo __("Claim Submission"); ?></a></li>
                <!-- Updated link -->
                <li><a href="/Claim/claimHistory"><?php echo __("Claim History"); ?></a></li>
                <li><a href="/User/notification"><?php echo __("Notifications"); ?></a></li>
                <li><a href="/Home/customerSupport"><?php echo __("Customer Support"); ?></a></li>
                <li><a href="/Home/loginSelection"><?php echo __("Go to Login/Register"); ?></a></li>
            </ul>
        </div>
    </nav>
    <!-- Tutorial Section -->
    <section id="tutorial">
        <div class="container">
            <h2><?php echo __("Claim Submission and Viewing Tutorial"); ?></h2>

            <!-- How to Submit a Claim -->
            <div id="submit-claim">
                <h3><?php echo __("How to Submit a Claim"); ?></h3>
                <p><?php echo __("Follow these steps to submit a claim:"); ?></p>
                <ol>
                    <li><?php echo __("Step 1: Log in to your account."); ?></li>
                    <li><?php echo __("Step 2: Navigate to the"); ?>
                        <a href="/Claim/claimSubmission" style="color: blue;"><?php echo __("Claim Submission"); ?></a>
                        <?php echo __("page."); ?>
                    </li>
                    <li><?php echo __("Step 3: Fill out the necessary details in the submission form."); ?></li>
                    <li><?php echo __("Step 4: Review your submission and click 'Submit'."); ?></li>
                </ol>
            </div>

            <!-- How to View Submitted Claims -->
            <div id="view-claim">
                <h3><?php echo __("How to View Submitted Claims"); ?></h3>
                <p><?php echo __("To view your submitted claims, follow these steps:"); ?></p>
                <ol>
                    <li><?php echo __("Step 1: Log in to your account."); ?></li>
                    <li><?php echo __("Step 2: Navigate to the"); ?>
                        <a href="/Claim/claimHistory" style="color: blue;"><?php echo __("Claim History"); ?></a>
                        <?php echo __("page."); ?>
                    </li>
                    <li><?php echo __("Step 3: Here you will find a list of all your submitted claims and their statuses."); ?>
                    </li>
                    <li><?php echo __("Step 4: Click on a claim to view more details."); ?></li>
                </ol>
            </div>
        </div>
    </section>

    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/9d85be25-4f92-441b-a9d8-9eba09ec2430/webchat/config.js"
        defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


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