Feature: The "testing" endpoint
  As a developer
  I should be able to make requests to "testing"
  So that I can get a feel for how this API is set up

  Scenario: The most basic request
    When I send a GET request to "testing"
    Then the response content type should be "application/json"
    And the response status code should be 200
    And the response should contain a "message" entry
    And the response entry "message" should contain "Hello World"