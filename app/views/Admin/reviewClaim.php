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
    <div class="review-claim">
        <h2>Review Claim</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Claim ID</th>
                    <th>Policy ID</th>
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
                    <tr>
                        <td><?php echo $data->claim_id; ?></td>
                        <td><?php echo $data->policy_id; ?></td>
                        <td><?php echo $data->user_id; ?></td>
                        <td><?php echo $data->claim_type; ?></td>
                        <td><?php echo $data->submission_date; ?></td>
                        <td><?php echo $data->status; ?></td>
                        <td><?php echo $data->claim_details; ?></td>
                        <td>
                            <a href="/Admin/approveClaim/<?php echo $data->claim_id; ?>" class="btn btn-success">Approve
                                Claim</a>
                            <a href="/Admin/denyClaim/<?php echo $data->claim_id; ?>" class="btn btn-danger">Deny Claim</a>
                        </td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No claim data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="notes-section">
        <h2>Add Notes</h2>
        <form action="/Admin/submitReview/<?php echo $data->claim_id; ?>" method="POST">
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="3" required></textarea>
            </div>
            <input type="hidden" name="claim_id" value="<?php echo $data->claim_id; ?>">
            <button type="submit" class="btn btn-primary">Add Notes</button>
        </form>
    </div>
</body>

</html>