<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Create Profile"); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <div class="container">
            <h1><?php echo __("Create Profile"); ?></h1>
        </div>
    </header>
    <div class="container">
        <div class="content">
            <form action="/ProfileController/create" method="POST" enctype="multipart/form-data"
                class="needs-validation">
                <div class="mb-3">
                    <label for="birthdate"><?php echo __("Birthdate:"); ?></label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    <div class="invalid-feedback">
                        <?php echo __("Please provide a valid birthdate."); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="policy_number"><?php echo __("Policy Number:"); ?></label>
                    <input type="text" class="form-control" id="policy_number" name="policy_number" required>
                    <div class="invalid-feedback">
                        <?php echo __("Please provide a policy number."); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="profile_picture"><?php echo __("Profile Picture:"); ?></label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*"
                        required>
                    <div class="invalid-feedback">
                        <?php echo __("Please upload a profile picture."); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><?php echo __("Create Profile"); ?></button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
