Feature: System Notifications

In order to stay informed about system updates
As a user
I need to receive notifications about important changes

Scenario: Receiving email notifications for system updates
  Given there is an important system update or change
  When the update is deployed
  Then I should receive an email notification with details about the update, including its purpose, impact, and any actions required on my part

Scenario: Receiving in-app notifications for urgent system alerts
  Given there is an urgent system alert, such as system downtime or critical maintenance
  When the alert is triggered
  Then I should receive an in-app notification immediately upon logging into the system, informing me of the situation and providing guidance on any necessary actions or precautions
