<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap JS -->
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
                <li><a href="/Home/claimSubmission">Claim Submission</a></li>
                <li><a href="/Home/customerSupport">Customer Support</a></li>
                <li><a href="/Home/loginSelection">Go to Login/Register</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <section id="profile">
            <h2>Profile</h2>
            <div class="profile-container">
                <img id="profile_picture" src="<?php echo $data['profile']->profile_picture; ?>" alt="Profile Picture">
                <div class="profile-info">
                    <label for="username">Username:</label>
                    <p id="username"><?php echo $data['user']->username; ?></p>
                    <label for="fullname">Full Name:</label>
                    <p id="fullname"><?php echo $data['user']->full_name; ?></p>
                    <label for="email">Email:</label>
                    <p id="email"><?php echo $data['user']->email; ?></p>
                    <label for="phone">Phone:</label>
                    <p id="phone"><?php echo $data['user']->phone; ?></p>
                    <label for="address">Address:</label>
                    <p id="address"><?php echo $data['user']->address; ?></p>
                    <label for="policy_number">Policy Number:</label>
                    <p id="policy_number"><?php echo $data['profile']->policy_number; ?></p>
                    <label for="birthdate">Birthdate:</label>
                    <p id="birthdate"><?php echo $data['profile']->birthdate; ?></p>
                </div>
            </div>
            <div class="profile-actions">
                <a href="/ProfileController/changeProfile">Edit Profile</a>
                <a href="/User/forgotPassword">Forgot Password</a>
                <a href="/User/logout">Logout</a>
            </div>
        </section>


        <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
        <script src="https://mediafiles.botpress.cloud/9d85be25-4f92-441b-a9d8-9eba09ec2430/webchat/config.js"
            defer></script>
    </div>
    <footer>
        <div class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, our support team is here to help.</p>
            <p>Email: support@aaosinsurance.com</p>
            <p>Phone: 1-800-555-1234</p>
            <p>&copy; 2024 AAOS Insurance. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>