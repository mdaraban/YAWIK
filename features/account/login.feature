Feature: Login to yawik
    In order to apply job
    As a Visitor
    I want to be able to log in to Yawik

    Background:
        Given there is a user "test@example.com" identified by "test"

    @javascript
    Scenario: Sign in with username
        When I want to log in
        And I specify the username as "test@example.com"
        And I specify the password as "test"
        And I log in
        Then I should see "Dashboard"
        And I should see "You are now logged in."

    @javascript
    Scenario: Sign in with bad credentials
        When I want to log in
        And I specify the username as "test@example.com"
        And I specify the password as "false"
        And I log in
        Then I should see "Authentication failed."


    @javascript
    Scenario: Sign in with unregistered username
        When I want to log in
        And I specify the username as "foo"
        And I specify the password as "bar"
        And I log in
        Then I should see "Authentication failed."

    @javascript
    Scenario: Sign out
        Given I am logged in as "test@example.com" identified by "test"
        When I press logout link
        And I should see "Welcome to YAWIK"
        Then I should see "You are now logged out"