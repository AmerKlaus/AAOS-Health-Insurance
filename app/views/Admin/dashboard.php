<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>

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
    <div class="pending-claims">
        <h2>Pending Claim Documents</h2>
        <ul>
            <?php foreach ($pendingClaimDocuments as $claimDocument): ?>
                <li>
                    <!-- Display claim document details -->
                    <a href="/Admin/reviewClaimDocument/<?php echo $claimDocument['claim_id']; ?>">Review Document</a>
                    <a href="/Admin/requestAdditionalInfo/<?php echo $claimDocument['claim_id']; ?>">Request Additional
                        Info</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>