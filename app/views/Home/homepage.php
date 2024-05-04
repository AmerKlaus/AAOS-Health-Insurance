<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <div class="container">
            <h1>AAOS Health Insurance</h1>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="/Home/index">Home</a></li>
                <li><a href="/ProfileController/index">Profile</a></li>
                <li><a href="/Home/claimSubmission">Claim Submission</a></li> 
                <li><a href="/Home/claimDetails">Claim Details</a></li>
                <li><a href="/Home/customerSupport">Customer Support</a></li>
                <li><a href="/Home/loginSelection">Go to Login/Register</a></li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="middle">
            <section id="home" class="section bg-light-blue">
                <div class="container">
                    <h2>Welcome to AAOS Health Insurance</h2>
                    <p>Providing comprehensive health coverage for your peace of mind.</p>
                </div>
            </section>
            <section id="profile" class="section bg-light-green">
                <div class="container">
                    <h2>Your Profile</h2>
                    <p>Manage your personal information and policy details easily.</p>
                    <a href="/ProfileController/index" class="btn">Go to Profile</a> <!-- Updated the href -->
                </div>
            </section>
            <section id="claims" class="section bg-light-orange">
                <div class="container">
                    <h2>Claims</h2>
                    <p>Submit and track your health insurance claims with convenience.</p>
                    <a href="/Home/claimSubmission" class="btn">Go to Claims</a> <!-- Updated the href -->
                </div>
            </section>
        </div>
        <div class="sidebar">
            
            <!-- Banner Image -->
            <img src="../images/banner.jpg" alt="Banner Image">

        </div>
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
