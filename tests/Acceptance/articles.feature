Feature: Accessing Knowledge Base

In order to access information about insurance
As a user
I need access to a knowledge base of articles and resources

Scenario: Accessing the knowledge base homepage
  Given I am logged into the system as a user
  When I navigate to the knowledge base section
  Then I should see a homepage with categories such as "Insurance Claims," "Coverage Options," and "Industry News"
  And I should be able to click on each category to view related articles and resources

Scenario: Viewing specific articles in the knowledge base
  Given I am logged into the system as a user
  When I click on the "Insurance Claims" category in the knowledge base
  And I select an article titled "Understanding Insurance Claims Process"
  Then I should be directed to the article page with detailed information about insurance claims
  And I should see options to navigate back to the knowledge base homepage or browse related articles
