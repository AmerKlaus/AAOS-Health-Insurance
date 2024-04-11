Feature: Generate Payments
  In order to process approved claims accurately and efficiently
  As an admin
  I need to generate payments for approved claims

  Scenario: Generating payment for an approved claim
    Given I approve a claim
    When the payment generation process is initiated
    Then the payment should be generated accurately and efficiently
