<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Customer Support"); ?></title>

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
                <li><a href="/Claim/claimHistory"><?php echo __("Claim History"); ?></a></li>
                <li><a href="/User/notification"><?php echo __("Notifications"); ?></a></li>
                <li><a href="/Home/customerSupport"><?php echo __("Customer Support"); ?></a></li>
                <li><a href="/Home/loginSelection"><?php echo __("Go to Login/Register"); ?></a></li>
            </ul>
        </div>
    </nav>

    <!-- Knowledge Base Section -->
    <section id="knowledge-base">
        <div class="container">
            <h2><?php echo __("Knowledge Base"); ?></h2>
            <p><?php echo __("Welcome to our knowledge base! Here, you can find articles and resources related to insurance."); ?>
            </p>

            <!-- Categories -->
            <h3><?php echo __("Categories:"); ?></h3>
            <ul>
                <li><a href="/Home/insuranceClaimsInfo"><?php echo __("Insurance Claims"); ?></a></li>
                <li><a href="/Home/coverageOptions"><?php echo __("Coverage Options"); ?></a></li>
                <li><a href="/Home/industryNews"><?php echo __("Industry News"); ?></a></li>
            </ul>
        </div>
    </section>

    <!-- Tutorial Section -->
    <section id="tutorial">
        <div class="container">
            <h2><?php echo __("Claim Submission and Viewing Tutorial"); ?></h2>
            <p><?php echo __("Would you like assistance with submitting a claim or viewing your submitted claims? Check out our tutorial below:"); ?>
            </p>
            <ul>
                <li><a href="/Home/claimTutorial"><?php echo __("How to Submit a Claim"); ?></a></li>
            </ul>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq">
        <div class="container">
            <h2><?php echo __("FAQ"); ?></h2>
            <p><?php echo __("Here are some frequently asked questions:"); ?></p>
            <ul>
                <li><strong><?php echo __("How do I renew my policy?"); ?></strong><br>
                    <?php echo __("You can renew your policy online through our website or by contacting our customer support."); ?>
                </li>
                <li><strong><?php echo __("What is covered under my policy?"); ?></strong><br>
                    <?php echo __("Coverage varies depending on the type of policy you have. Please refer to your policy documents for details."); ?>
                </li>
                <li><strong><?php echo __("How do I update my personal information?"); ?></strong><br>
                    <?php echo __("You can update your personal information by logging into your account on our website or by contacting customer support."); ?>
                </li>
            </ul>
        </div>
    </section>

    <!-- Send Message Section -->
    <section id="send-message">
        <div class="container">
            <h2><?php echo __("Send Message to Customer Support"); ?></h2>
            <p><?php echo __("If you need assistance or have any inquiries, please use the form below to send us a message:"); ?>
            </p>
            <section id="feedback-submission">
                <h2><?php echo __("Customer Support"); ?></h2>
                <form action="/Home/customerSupport" method="POST" class="feedback-form">
                    <label for="feedback_text"><?php echo __("Your Feedback:"); ?></label>
                    <textarea id="feedback_text" name="feedback_text" rows="4" required></textarea>

                    <button type="submit"><?php echo __("Submit Feedback"); ?></button>
                </form>
            </section>


            <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
            <script src="https://mediafiles.botpress.cloud/9d85be25-4f92-441b-a9d8-9eba09ec2430/webchat/config.js"
                defer></script>

        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

            </script>
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