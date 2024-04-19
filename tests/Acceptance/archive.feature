Feature: Archive Historical Claims Data

In order to comply with regulations and facilitate future reference
As an admin
I need to securely archive historical claims data

Scenario: Archiving historical claims data
  Given I am logged into the system as an admin
  When I access the archive feature
  Then I should see options to select the time period for archiving
  And I should be able to choose specific categories or types of claims to archive
  And I confirm the archiving process
  Then I receive a confirmation message that historical claims data has been securely archived

Scenario: Retrieving archived historical claims data
  Given I am logged into the system as an admin
  When I navigate to the archive section
  And I search for archived claims based on criteria like date range, claim type, or customer ID
  Then I should see a list of archived claims matching the search criteria
  And I should be able to download individual archived claims or batches of archived claims as a ZIP file
