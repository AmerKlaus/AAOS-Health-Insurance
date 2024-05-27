<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Coverage Options - Knowledge Base"); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <div class="container">
            <h1><?php echo __("AAOS Insurance Customer Support"); ?></h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="/Home/index"><?php echo __("Home"); ?></a></li>
                <li><a href="/ProfileController/index"><?php echo __("Profile"); ?></a></li>
                <li><a href="/Claim/claimSubmission"><?php echo __("Claim Submission"); ?></a></li>
                <li><a href="/Claim/claimHistory"><?php echo __("Claim History"); ?></a></li>
                <li><a href="/User/notification"><?php echo __("Notifications"); ?></a></li>
                <li><a href="/Home/customerSupport"><?php echo __("Customer Support"); ?></a></li>
                <li><a href="/Home/loginSelection"><?php echo __("Go to Login/Register"); ?></a></li>
            </ul>
        </div>
    </nav>

    <!-- Knowledge Base Section -->
    <section id="knowledge-base">
        <div class="container">
            <h2><?php echo __("Coverage Options - Knowledge Base"); ?></h2>
            <p><?php echo __("Welcome to our knowledge base! Here, you can explore the coverage options provided by our insurance policies."); ?></p>

            <!-- Detailed Information -->
            <h3><?php echo __("Health Coverage:"); ?></h3>
            <p><?php echo __("Our health insurance policies typically cover:"); ?></p>
            <ul>
                <li>
                    <strong><?php echo __("Doctor's visits and consultations:"); ?></strong> <?php echo __("This includes appointments with primary care physicians, specialists, and other healthcare providers for diagnosis, treatment, and preventive care."); ?>
                </li>
                <li>
                    <strong><?php echo __("Hospital stays and surgeries:"); ?></strong> <?php echo __("Coverage extends to expenses incurred during hospitalization, including room charges, surgical procedures, anesthesia, and related medical services."); ?>
                </li>
                <li>
                    <strong><?php echo __("Prescription medications:"); ?></strong> <?php echo __("This covers the cost of prescription drugs prescribed by healthcare providers to manage acute or chronic conditions."); ?>
                </li>
                <li>
                    <strong><?php echo __("Lab tests and diagnostic procedures:"); ?></strong> <?php echo __("Coverage includes laboratory tests, imaging studies, and other diagnostic procedures ordered by healthcare providers to assess health status and aid in diagnosis."); ?>
                </li>
                <li>
                    <strong><?php echo __("Preventive care services:"); ?></strong> <?php echo __("This encompasses routine screenings, vaccinations, wellness exams, and other preventive measures aimed at maintaining optimal health and detecting health issues early."); ?>
                </li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <h2><?php echo __("Contact Us"); ?></h2>
            <p><?php echo __("If you have any questions or need assistance, our support team is here to help."); ?></p>
            <p><?php echo __("Email"); ?>: <a href="mailto:aaos.coo@gmail.com">aaos.coo@gmail.com</a></p>
            <p><?php echo __("Phone"); ?>: 1-800-555-1234</p>
            <p>&copy; 2024 <?php echo __("AAOS Insurance. All rights reserved."); ?></p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
