<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Notifications"); ?></title>

    <!-- Bootstrap CSS -->
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
        <section id="claim-detail" class="claim-history">
            <h2><?php echo __("Notifications"); ?></h2>
            <div class="claim-card">
                <?php foreach ($data['notifications'] as $notification): ?>
                    <div class="notification">
                        <p><strong><?php echo __("Type:"); ?></strong> <?php echo $notification->notification_type; ?></p>
                        <p><strong><?php echo __("Content:"); ?></strong> <?php echo $notification->notification_content; ?>
                        </p>
                        <p><strong><?php echo __("Timestamp:"); ?></strong> <?php echo $notification->timestamp; ?></p>
                        <a href="/Claim/edit/<?php echo $notification->claim_id; ?>"
                            class="btn btn-primary"><?php echo __("Edit Claim"); ?></a>
                    </div><br>
                    <hr>
                <?php endforeach; ?>
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
        </div>
    </footer>
</body>

</html>