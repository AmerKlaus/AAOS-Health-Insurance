<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Reset Your Password"); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Your custom CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center"><?php echo __("Reset Your Password"); ?></h2>
                        <form action="/User/resetPassword" method="POST">
                            <div class="mb-3">
                                <label for="new-password" class="form-label"><?php echo __("New Password:"); ?></label>
                                <input type="password" id="new-password" name="new_password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label"><?php echo __("Confirm Password:"); ?></label>
                                <input type="password" id="confirm-password" name="confirm_password" class="form-control" required>
                            </div>
                            <!-- Check if $_GET['token'] is set before using it -->
                            <?php if(isset($_GET['token'])): ?>
                                <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>"> 
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary"><?php echo __("Reset Password"); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
