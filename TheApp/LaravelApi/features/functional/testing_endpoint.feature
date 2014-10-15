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

  Scenario: A GET request with some query string jargon
    Given I have some data to send:
      | message      | A great message    |
    When I send a GET request to "testing/echo"
    Then the response entry "echo" should be "Echo: A great message"

  Scenario: Sending data along with a POST request
    Given I have some data to send:
      | foo        | bar   |
      | dummy      | 23    |
    When I send a POST request to "testing/echo"
    Then the response should contain a "dummy" entry
    And the response entry "foo" should be "bar"
    And the response entry "dummy" should be 23