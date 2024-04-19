Feature: Categorize Claims

In order to streamline processing workflow
As an admin
I need to categorize claims based on urgency and priority

Scenario: Categorizing claims
  Given I am logged into the system as an admin
  And I navigate to the claim management dashboard
  And I review a pending claim with ID #12345
  When I categorize the claim based on urgency and priority, considering factors such as severity, policy type, and customer status
  And I assign a high priority and urgent status to the claim due to critical medical needs and policy coverage
  Then the claim should be prioritized accordingly for processing, appearing at the top of the processing queue for immediate attention

Scenario: Updating claim category
  Given I am logged into the system as an admin
  And I navigate to the claim management section
  When I view a categorized claim
  And I decide to update its category based on changing circumstances
  Then the claim should be re-prioritized for processing according to the updated category
