<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Claim History"); ?></title>

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
            <h2><?php echo __("Claim History"); ?></h2>
            <div class="claim-card">
                <?php if (!empty($data['claims'])): ?>
                    <?php foreach ($data['claims'] as $claim): ?>
                        <div class="claim-info">
                            <p><strong><?php echo __("Claim ID:"); ?></strong> <?php echo $claim->claim_id; ?></p>
                            <p><strong><?php echo __("Policy Number:"); ?></strong> <?php echo $data['profile']->policy_number; ?></p>
                            <p><strong><?php echo __("Claim Type:"); ?></strong> <?php echo $claim->claim_type; ?></p>
                            <p><strong><?php echo __("Claim Status:"); ?></strong> <?php echo $claim->status; ?></p>
                            <p><strong><?php echo __("Claim Details:"); ?></strong> <?php echo $claim->claim_details; ?></p>
                            <p><strong><?php echo __("Claim Amount:"); ?></strong> $1000</p>
                            <p><strong><?php echo __("Claim Date:"); ?></strong> <?php echo $claim->submission_date; ?></p>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                <p>No claims found.</p>
                <?php endif; ?>
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
