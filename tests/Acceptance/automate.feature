Feature: Automate Routine Tasks
  In order to improve efficiency in claim processing
  As an admin
  I need to automate routine tasks such as data entry or document verification
  
  Scenario: Automating data entry
    Given I am processing a claim
    When I encounter fields with standard data that can be automatically filled
    Then the system should automatically populate these fields to reduce manual data entry

  Scenario: Automating document verification
    Given I am verifying claim documents
    When I identify standard verification procedures for certain types of documents
    Then the system should automatically verify these documents based on predefined criteria
