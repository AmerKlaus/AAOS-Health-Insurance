<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
                <li><a href="/User/profile">Profile</a></li>
                <li><a href="/Home/claimSubmission">Claim Submission</a></li>
                <li><a href="/Home/claimDetails">Claim Details</a></li>
                <li><a href="/Home/customerSupport">Customer Support</a></li>
                <li><a href="/User/login">Go to Login/Register</a></li>
        </ul>
    </div>
</nav>

    <div class="container">
        <section id="profile">
            <h2>Profile</h2>
            <div class="profile-info">
                <label for="username">Username:</label>
                <p id="username">JohnDoe123</p>
                <label for="email">Email:</label>
                <p id="email">johndoe@example.com</p>
                <label for="policy_number">Policy Number:</label>
                <p id="policy_number">123456789</p>
                <label for="address">Address:</label>
                <p id="address">123 Main Street, Anytown, USA</p>
                <label for="phone">Phone:</label>
                <p id="phone">555-123-4567</p>
                
            </div>
            <div class="profile-actions">
                <a href="edit_profile.html">Edit Profile</a>
                <a href="change_password.html">Change Password</a>
            </div>
        </section>
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
