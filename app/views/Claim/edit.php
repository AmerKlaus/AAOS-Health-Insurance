<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Edit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <h1>Edit Claim</h1>
        <form action="/Claim/edit/<?php echo $data['claim']->claim_id; ?>" method="POST" class="claim-form">
            <div class="mb-3">
                <label for="claim_type">Claim Type:</label>
                <select id="claim_type" class="form-control" name="claim_type" required>
                    <option value="health"><?php echo $data['claim']->claim_type; ?></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="claim_details">Claim Details:</label>
                <textarea class="form-control" id="claim_details" name="claim_details"
                    required><?php echo $data['claim']->claim_details; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="claim_date">Claim Date:</label>
                <input type="datetime-local" class="form-control" id="claim_date" name="claim_date"
                    value="<?php echo $data['claim']->submission_date; ?>" required>
            </div>
            <div class="mb-3">
                <label for="health_card_number">Health Card Number:</label>
                <input type="text" class="form-control" id="health_card_number" name="health_card_number"
                    value="<?php echo $data['claim']->health_insurance_number; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>

</html>