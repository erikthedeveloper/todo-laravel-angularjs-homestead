Feature: Basic API Routes
    In order to interact with my application from the front end
    As a front end developer with no knowledge of API wizardry
    I need to have an awesomely clear API to work with

    Scenario: GET "/"
        When I send a GET request to "/"
        Then the response code should be 200
        And the JSON response should have a "message" containing "Hello World"