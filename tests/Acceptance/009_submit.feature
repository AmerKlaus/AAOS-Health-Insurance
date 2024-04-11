Feature: Easy Claim Document Submission

In order to submit claim documents conveniently
As a user
I need to be able to upload documents through the web application

Scenario: Uploading claim documents
Given I am logged into the system as a user
When I navigate to the claim submission section
And I click "add claim"
And I select "account.txt" and click "upload"
Then I see "account.txt" in the submitted files
