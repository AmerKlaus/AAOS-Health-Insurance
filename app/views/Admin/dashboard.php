<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
            <h1>Admin Dashboard</h1>
        </div>
    </header>
    <div class="pending-claims">
        <h2>Pending Claims</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Claim ID</th>
                    <th>User ID</th>
                    <th>Claim Type</th>
                    <th>Submission Date</th>
                    <th>Status</th>
                    <th>Claim Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $claim): ?>
                        <tr>
                            <td><?php echo $claim->claim_id; ?></td>
                            <td><?php echo $claim->user_id; ?></td>
                            <td><?php echo $claim->claim_type; ?></td>
                            <td><?php echo $claim->submission_date; ?></td>
                            <td><?php echo $claim->status; ?></td>
                            <td><?php echo $claim->claim_details; ?></td>
                            <td>
                                <a href="/Admin/requestInfo/<?php echo $claim->claim_id; ?>" class="btn btn-primary">Request
                                    Additional Info</a>
                                <a href="/Admin/reviewClaim/<?php echo $claim->claim_id; ?>" class="btn btn-info">Review
                                    Claim</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No pending claims to display</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="/Home/index" class="btn btn-info">Go back to home page</a>
    </div>
</body>

</html>