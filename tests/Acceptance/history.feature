Feature: Viewing Claim History

In order to track my past claims
As a user
I need to view the history of my claims and their statuses

Scenario: Viewing detailed claim history
  Given I am logged into the system as a user
  And I have navigated to the claim history section
  When I view my past claims
  Then I should see a detailed list of each claim, including claim ID, date submitted, claim type, status, and any relevant notes or updates

Scenario: Filtering and searching claim history
  Given I am viewing my claim history
  When I use the filtering options or search functionality
  Then I should be able to filter claims based on criteria such as claim type, status, date range, or keywords
  And the system should display the filtered results accordingly for easy reference and tracking
