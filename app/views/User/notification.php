<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>

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
                <li><a href="/User/notification">Notifications</a></li>
                <li><a href="/Home/customerSupport">Customer Support</a></li>
                <li><a href="/Home/loginSelection">Go to Login/Register</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <section id="claim-detail" class="claim-history">
            <h2>Notifications</h2>
            <div class="claim-card">
                <?php foreach ($data['notifications'] as $notification): ?>
                    <div class="notification">
                        <p><strong>Type:</strong> <?php echo $notification->notification_type; ?></p>
                        <p><strong>Content:</strong> <?php echo $notification->notification_content; ?></p>
                        <p><strong>Timestamp:</strong> <?php echo $notification->timestamp; ?></p>
                        <a href="/Claim/edit/<?php echo $notification->claim_id; ?>" class="btn btn-primary">Edit
                            Claim</a>
                    </div><br>
                    <hr>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</body>

</html>