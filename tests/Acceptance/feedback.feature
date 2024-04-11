Feature: Submitting Feedback or Complaints

In order to provide feedback or complaints
As a user
I need to be able to do so directly through the web application

Scenario: Submitting feedback or complaints
Given I am logged into the system as a user
When I navigate to the feedback/complaints section
And submit my feedback or complaint
Then it should be recorded and addressed by the appropriate team
