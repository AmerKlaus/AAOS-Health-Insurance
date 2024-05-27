<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __("Industry News - Knowledge Base"); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            <h2><?php echo __("Industry News - Knowledge Base"); ?></h2>
            <p><?php echo __("Welcome to our knowledge base! Here, you can find the latest news and updates related to the insurance industry."); ?></p>

            <!-- Detailed Information -->
            <h3><?php echo __("Recent Articles:"); ?></h3>
            <p><?php echo __("Stay up-to-date with the latest developments in the insurance sector through our curated articles:"); ?></p>
            <ul>
                <li><?php echo __("Explore how emerging technologies like artificial intelligence are transforming claims processing and underwriting. Stay informed about the latest trends shaping the insurance landscape and understand how these advancements impact policyholders."); ?></li>
                <li><?php echo __("Learn about the impact of regulatory changes on insurance policies and coverage options. Our articles provide insights into recent legislative updates and regulatory shifts affecting insurance providers and consumers, helping you navigate the evolving regulatory environment."); ?></li>
                <li><?php echo __("Discover trends in the insurance market, from innovative product offerings to shifts in consumer behavior. Our articles analyze market trends, emerging risks, and opportunities in the insurance sector, providing valuable insights for industry professionals and consumers alike."); ?></li>
            </ul>

            <h3><?php echo __("Industry Updates:"); ?></h3>
            <p><?php echo __("Keep informed about recent developments and trends shaping the insurance industry:"); ?></p>
            <ul>
                <li><?php echo __("Get insights into the latest mergers and acquisitions in the insurance sector and their implications for policyholders. Our updates cover industry consolidation, partnership agreements, and strategic alliances, helping you understand how these developments may impact your insurance coverage and options."); ?></li>
                <li><?php echo __("Stay informed about changes in healthcare legislation and their effects on insurance providers and consumers. We provide updates on healthcare policy reforms, regulatory initiatives, and legislative changes affecting health insurance coverage, ensuring you stay informed about important developments in the healthcare sector."); ?></li>
                <li><?php echo __("Find out about upcoming industry events and conferences where you can network and learn about the latest industry trends. Our updates highlight key industry events, conferences, and seminars, providing opportunities for industry professionals to connect, share insights, and stay ahead of the curve."); ?></li>
            </ul>
        </div>
    </section>

    <footer>
            <div class="container">
                <h2><?php echo __("Contact Us"); ?></h2>
                <p><?php echo __("If you have any questions or need assistance, our support team is here to help."); ?>
                </p>
                <p><?php echo __("Email"); ?>: <a href="mailto:aaos.coo@gmail.com">aaos.coo@gmail.com</a></p>
                <p><?php echo __("Phone"); ?>: 1-800-555-1234</p>
                <p>&copy; 2024 <?php echo __("AAOS Insurance"); ?>. <?php echo __("All rights reserved."); ?></p>
            </div>
        </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
