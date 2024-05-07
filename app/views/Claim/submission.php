<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Claim</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
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
                <li><a href="/Claim/claimSubmission">Claim Submission</a></li>
                <li><a href="/Claim/claimHistory">Claim History</a></li>
                <li><a href="/Home/customerSupport">Customer Support</a></li>
                <li><a href="/Home/loginSelection">Go to Login/Register</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <section id="claim-submission">
            <h2>Claim Submission</h2>
            <form action="/Claim/submitClaim" method="POST" class="claim-form">
                <label for="claim_type">Claim Type:</label>
                <select id="claim_type" class="form-control" name="claim_type" required>
                    <option value="health">Health</option>
                </select>

                <label for="claim_details">Claim Details:</label>
                <textarea id="claim_details" class="form-control" name="claim_details" rows="4" required></textarea>

                <label for="claim_date">Claim Date:</label>
                <input type="datetime-local" class="form-control" id="claim_date" name="claim_date" required>

                <label for="health_card_number">Health Insurance Card Number:</label>
                <input type="text" class="form-control" id="health_card_number" name="health_card_number"
                    class="health-card-input" required>

                <button type="submit">Submit Claim</button>
            </form>

            
            <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
            <script src="https://mediafiles.botpress.cloud/9d85be25-4f92-441b-a9d8-9eba09ec2430/webchat/config.js" defer></script>
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
