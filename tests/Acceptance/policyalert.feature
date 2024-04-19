Feature: Proactive Risk Alerts

In order to stay informed about potential risks or changes in coverage
As a user
I need to receive proactive alerts

Scenario: Receiving proactive risk alert for policy renewal
  Given my insurance policy is due for renewal in 30 days
  When the system detects potential coverage changes or risk factors affecting my policy
  Then I should receive a proactive risk alert via email or in-app notification, detailing the changes and recommended actions
