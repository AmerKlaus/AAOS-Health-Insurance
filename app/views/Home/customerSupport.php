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
            <h1>AAOS Insurance Customer Support</h1>
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
    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions or concerns, feel free to reach out to us:</p>
            <p>Email: support@aaosinsurance.com</p>
            <p>Phone: 1-800-555-1234</p>
        </div>
    </section>
    <section id="faq">
        <div class="container">
            <h2>FAQ</h2>
            <p>Here are some frequently asked questions:</p>
            <ul>
                <li><strong>How do I renew my policy?</strong><br>
                    You can renew your policy online through our website or by contacting our customer support.</li>
                <li><strong>What is covered under my policy?</strong><br>
                    Coverage varies depending on the type of policy you have. Please refer to your policy documents for details.</li>
                <li><strong>How do I update my personal information?</strong><br>
                    You can update your personal information by logging into your account on our website or by contacting customer support.</li>
            </ul>
        </div>
    </section>
    <section id="send-message">
        <div class="container">
            <h2>Send Message to Customer Support</h2>
            <p>If you need assistance or have any inquiries, please use the form below to send us a message:</p>
            <form action="submit_message.php" method="post">
                <label for="name">Your Name:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Your Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" required></textarea><br>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>
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