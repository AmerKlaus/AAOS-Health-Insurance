<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Edit Profile"); ?></title>

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
            <h1><?php echo __("Edit Profile"); ?></h1>
        </div>
    </header>

    <div class="container">
        <section id="edit-profile">
            <form action="/ProfileController/editProfile" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="full_name" class="form-label"><?php echo __("Full Name"); ?></label>
                    <input type="text" class="form-control" id="full_name" name="full_name"
                        value="<?php echo $data['user']->full_name; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><?php echo __("Email"); ?></label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo $data['user']->email; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label"><?php echo __("Address"); ?></label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="<?php echo $data['user']->address; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label"><?php echo __("Phone"); ?></label>
                    <input type="text" class="form-control" id="phone" name="phone"
                        value="<?php echo $data['user']->phone; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label"><?php echo __("Birthdate"); ?></label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate"
                        value="<?php echo $data['profile']->birthdate; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="policy_number" class="form-label"><?php echo __("Policy Number"); ?></label>
                    <input type="text" class="form-control" id="policy_number" name="policy_number"
                        value="<?php echo $data['profile']->policy_number; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="profile_picture"><?php echo __("Profile Picture"); ?>:</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture"
                        accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary"><?php echo __("Save Changes"); ?></button>
            </form>
        </section>
    </div>
</body>

</html>
