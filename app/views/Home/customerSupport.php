<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support</title>

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
            <h1>AAOS Insurance Customer Support</h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="/Home/index">Home</a></li>
                <li><a href="/ProfileController/index">Profile</a></li>
                <li><a href="/Claim/claimSubmission">Claim Submission</a></li>
                <li><a href="/Claim/claimHistory">Claim History</a></li>
                <li><a href="/User/notification">Notifications</a></li>
                <li><a href="/Home/customerSupport">Customer Support</a></li>
                <li><a href="/Home/loginSelection">Go to Login/Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Knowledge Base Section -->
    <section id="knowledge-base">
        <div class="container">
            <h2>Knowledge Base</h2>
            <p>Welcome to our knowledge base! Here, you can find articles and resources related to insurance.</p>

            <!-- Categories -->
            <h3>Categories:</h3>
            <ul>
                <li><a href="/Home/insuranceClaimsInfo">Insurance Claims</a></li>
                <li><a href="/Home/coverageOptions">Coverage Options</a></li>
                <li><a href="/Home/industryNews">Industry News</a></li>
            </ul>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq">
        <div class="container">
            <h2>FAQ</h2>
            <p>Here are some frequently asked questions:</p>
            <ul>
                <li><strong>How do I renew my policy?</strong><br>
                    You can renew your policy online through our website or by contacting our customer support.</li>
                <li><strong>What is covered under my policy?</strong><br>
                    Coverage varies depending on the type of policy you have. Please refer to your policy documents for
                    details.</li>
                <li><strong>How do I update my personal information?</strong><br>
                    You can update your personal information by logging into your account on our website or by
                    contacting customer support.</li>
            </ul>
        </div>
    </section>

    <!-- Send Message Section -->
    <section id="send-message">
        <div class="container">
            <h2>Send Message to Customer Support</h2>
            <p>If you need assistance or have any inquiries, please use the form below to send us a message:</p>
            <section id="feedback-submission">
                <h2>Customer Support</h2>
                <form action="/Home/customerSupport" method="POST" class="feedback-form">
                    <label for="feedback_text">Your Feedback:</label>
                    <textarea id="feedback_text" name="feedback_text" rows="4" required></textarea>

                    <button type="submit">Submit Feedback</button>
                </form>
            </section>


            <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
            <script src="https://mediafiles.botpress.cloud/9d85be25-4f92-441b-a9d8-9eba09ec2430/webchat/config.js"
                defer></script>
        </div>
    </section>

    <footer>
        <div class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, our support team is here to help.</p>
            <p>Email: <a href="mailto:aaos.coo@gmail.com">aaos.coo@gmail.com</a></p>
            <p>Phone: 1-800-555-1234</p>
            <p>&copy; 2024 AAOS Insurance. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>