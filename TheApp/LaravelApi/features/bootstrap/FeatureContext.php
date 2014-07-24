<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use GuzzleHttp\Client;

/**
 * Available auto-magically after composer install w/ phpunit/phpunit
 */
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{

    protected $client;

    protected $response;

    protected $base_url = 'http://api.my-todo-app.dev';

    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $client_params = [
            'base_url' => $this->base_url
        ];
        $this->client = new Client($client_params);
    }

    /**
     * @When /^I send a ([A-Z]+) request to "([^"]*)"$/
     */
    public function iSendARequestTo($method, $uri)
    {
        $request        = $this->client->createRequest($method, $uri);
        $this->response = $this->client->send($request);
    }

    /**
     * @Then /^the response code should be (\d+)$/
     */
    public function theResponseCodeShouldBe($response_code)
    {
        assertEquals($response_code, $this->response->getStatusCode());
    }

    /**
     * @Given /^the JSON response should have a "([^"]*)" containing "([^"]*)"$/
     */
    public function theJsonResponseShouldHaveAContaining($var_name, $var_contain_val)
    {
        $json_data = $this->response->json();
        assertArrayHasKey($var_name, $json_data);
        assertContains($var_contain_val, $json_data[$var_name]);
    }
}
