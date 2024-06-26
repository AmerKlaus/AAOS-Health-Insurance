<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Admin Dashboard"); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
    function changeSort(select) {
        window.location.href = select.value;
    }
</script>
</head>

<body>
    <header>
        <div class="container">
            <h1><?php echo __("Admin Dashboard"); ?></h1>
        </div>
    </header>
    <div class="pending-claims">
        <h2><?php echo __("Pending Claims"); ?></h2>
        <div class="sort-options">
        <label for="sort"><?php echo __("Sort By:"); ?></label>
    <select id="sort" onchange="changeSort(this)">
        <option value="/Admin/dashboard?sort=id" <?php if (!isset($_GET['sort']) || $_GET['sort'] == 'id') echo 'selected'; ?>>ID</option>
        <option value="/Admin/dashboard?sort=type" <?php if (!isset($_GET['sort']) || $_GET['sort'] == 'type') echo 'selected'; ?>>Type</option>
        <option value="/Admin/dashboard?sort=date" <?php if (!isset($_GET['sort']) || $_GET['sort'] == 'date') echo 'selected'; ?>>Date</option>
        <option value="/Admin/dashboard"<?php if(!isset($_GET['sort'])) echo 'selected'?>>Default</option>
    </select>
</div>
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo __("Claim ID"); ?></th>
                    <th><?php echo __("User ID"); ?></th>
                    <th><?php echo __("Claim Type"); ?></th>
                    <th><?php echo __("Submission Date"); ?></th>
                    <th><?php echo __("Status"); ?></th>
                    <th><?php echo __("Claim Details"); ?></th>
                    <th><?php echo __("Actions"); ?></th>
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
                                <a href="/Admin/requestInfo/<?php echo $claim->claim_id; ?>"
                                    class="btn btn-primary"><?php echo __("Request Additional Info"); ?></a>
                                <a href="/Admin/reviewClaim/<?php echo $claim->claim_id; ?>"
                                    class="btn btn-info"><?php echo __("Review Claim"); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7"><?php echo __("No pending claims to display"); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="/Home/index" class="btn btn-info"><?php echo __("Go back to home page"); ?></a>
        <a href="/Admin/logout" class="btn btn-info"><?php echo __("Logout"); ?></a>
    </div>
</body>

</html>
