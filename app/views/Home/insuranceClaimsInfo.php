<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Insurance Claims - Knowledge Base"); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
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
            <h2><?php echo __("Insurance Claims - Knowledge Base"); ?></h2>
            <p><?php echo __("Welcome to our knowledge base! Here, you can find detailed information related to insurance claims."); ?></p>

            <!-- Detailed Information -->
            <h3><?php echo __("Articles:"); ?></h3>
            <p><?php echo __("Here are some articles to help you understand insurance claims:"); ?></p>
            <ul>
                <li><strong><?php echo __("Understanding the Insurance Claims Process:"); ?></strong> <?php echo __("Learn about the steps involved in filing an insurance claim and what to expect."); ?></li>
                <li><strong><?php echo __("Tips for Filing Insurance Claims:"); ?></strong> <?php echo __("Discover useful tips and strategies to ensure a smooth and successful insurance claim process."); ?></li>
                <li><strong><?php echo __("Common Mistakes to Avoid in Insurance Claims:"); ?></strong> <?php echo __("Avoid pitfalls and mistakes that could jeopardize your insurance claim."); ?></li>
            </ul>

            <h3><?php echo __("Resources:"); ?></h3>
            <p><?php echo __("Check out these resources for more information:"); ?></p>
            <ul>
                <li><strong><?php echo __("Sample Claim Forms:"); ?></strong> <?php echo __("Download sample claim forms to help you fill out your insurance claim accurately."); ?></li>
                <li><strong><?php echo __("Guide to Insurance Claim Documentation:"); ?></strong> <?php echo __("Understand the documentation requirements for different types of insurance claims."); ?></li>
                <li><strong><?php echo __("FAQs on Insurance Claims:"); ?></strong> <?php echo __("Find answers to frequently asked questions about insurance claims."); ?></li>
            </ul>
        </div>
    </section>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
