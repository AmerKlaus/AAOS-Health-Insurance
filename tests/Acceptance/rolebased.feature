Feature: Role-Based Access Controls

  In order to protect sensitive data
  As an admin
  I need to implement role-based access controls

  Scenario: Setting up role-based access controls
    Given I am logged into the admin panel
    When I configure access controls for different roles
    Then only authorized personnel should access sensitive claims data
