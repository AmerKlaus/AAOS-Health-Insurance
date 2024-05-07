<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim History</title>

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
            <h1>AAOS Insurance</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="/Home/index">Home</a></li>
                <li><a href="/ProfileController/index">Profile</a></li>
                <li><a href="/Claim/claimSubmission">Claim Submission</a></li>
                <li><a href="/Claim/claimHistory">Claim History</a></li>
                <li><a href="/Home/customerSupport">Customer Support</a></li>
                <li><a href="/Home/loginSelection">Go to Login/Register</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <section id="claim-details" class="claim-history">
            <h2>Claim History</h2>
            <div class="claim-card">
                <?php foreach ($data['claims'] as $claim): ?>
                    <div class="claim-info">
                        <p><strong>Claim ID:</strong> <?php echo $claim->claim_id; ?></p>
                        <p><strong>Policy Number:</strong> <?php echo $data['profile']->policy_number; ?></p>
                        <p><strong>Claim Type:</strong> <?php echo $claim->claim_type; ?></p>
                        <p><strong>Claim Status:</strong> <?php echo $claim->status; ?></p>
                        <p><strong>Claim Details:</strong> <?php echo $claim->claim_details; ?></p>
                        <p><strong>Claim Amount:</strong> $1000</p>
                        <p><strong>Claim Date:</strong> <?php echo $claim->submission_date; ?></p>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
    <footer>
        <div id="claim-history" class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, our support team is here to help.</p>
            <p>Email: support@aaosinsurance.com</p>
            <p>Phone: 1-800-555-1234</p>
            <p>&copy; 2024 AAOS Insurance. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>