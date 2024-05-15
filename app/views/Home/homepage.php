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
    <link href="../css/style.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div class="container">
            <h1><?php echo __("AAOS Health Insurance"); ?></h1>
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
    <div class="wrapper">
        <div class="middle">
            <section id="home" class="section bg-light-blue">
                <div class="container">
                    <h2><?php echo __("Welcome to AAOS Health Insurance"); ?></h2>
                    <p><?php echo __("Providing comprehensive health coverage for your peace of mind."); ?></p>
                </div>
            </section>
            <section id="profile" class="section bg-light-green">
                <div class="container">
                    <h2><?php echo __("Your Profile"); ?></h2>
                    <p><?php echo __("Manage your personal information and policy details easily."); ?></p>
                    <a href="/ProfileController/index" class="btn"><?php echo __("Go to Profile"); ?></a>
                </div>
            </section>
            <section id="claims" class="section bg-light-orange">
                <div class="container">
                    <h2><?php echo __("Claims"); ?></h2>
                    <p><?php echo __("Submit and track your health insurance claims with convenience."); ?></p>
                    <a href="/Claim/claimSubmission" class="btn"><?php echo __("Go to Claims"); ?></a>
                </div>
            </section>


            <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
            <script src="https://mediafiles.botpress.cloud/9d85be25-4f92-441b-a9d8-9eba09ec2430/webchat/config.js"
                defer></script>
        </div>
        <div class="sidebar">

            <!-- Banner Image -->
            <img src="../images/banner.jpg" alt="Banner Image">
        </div>
    </div>
    <footer>
            <div class="container">
                <h2><?php echo __("Contact Us"); ?></h2>
                <p><?php echo __("If you have any questions or need assistance, our support team is here to help."); ?>
                </p>
                <p><?php echo __("Email"); ?>: <a href="mailto:aaos.coo@gmail.com">aaos.coo@gmail.com</a></p>
                <p><?php echo __("Phone"); ?>: 1-800-555-1234</p>
                <p>&copy; 2024 <?php echo __("AAOS Insurance"); ?>. <?php echo __("All rights reserved."); ?></p>
            </div>
        </footer>
</body>

</html>
