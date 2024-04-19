Feature: Online Policy Endorsements

  In order to request policy endorsements or modifications conveniently
  As a user
  I need to be able to do so online without lengthy paperwork

Scenario: Requesting policy endorsement online for adding coverage
  Given I am logged into the system as a user
  When I navigate to the policy endorsements section
  And request to add additional coverage to my policy
  Then my request should be processed without requiring extensive paperwork, and the updated policy should reflect the added coverage

Scenario: Requesting policy endorsement online for changing policy details
  Given I am logged into the system as a user
  When I navigate to the policy endorsements section
  And request to modify details such as address or insured items on my policy
  Then my request should be processed without requiring extensive paperwork, and the updated policy should reflect the requested changes
