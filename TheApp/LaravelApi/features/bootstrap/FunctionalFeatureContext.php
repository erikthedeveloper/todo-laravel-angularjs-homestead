<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use GuzzleHttp\Client;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Defines application features from the specific context.
 */
class FunctionalFeatureContext implements Context, SnippetAcceptingContext
{

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var \GuzzleHttp\Message\ResponseInterface
     */
    protected $response;

    /**
     * @var array
     */
    protected $request_data = [];

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->client = new Client(['base_url' => 'http://api.todo-angular.dev/']);
    }

    /**
     * @Given I have some data to send:
     */
    public function iHaveSomeDataToSend(TableNode $table)
    {
        $data = $table->getRowsHash();
        $this->request_data = $data;
    }

    /**
     * @When I send a GET request to :uri
     */
    public function iSendAGetRequestTo($uri)
    {
        $data = [
            'query' => $this->request_data
        ];
        $response = $this->client->get($uri, $data);
        $this->response = $response;
    }

    /**
     * @When I send a POST request to :uri
     */
    public function iSendAPostRequestTo($uri)
    {
        $data = [
            'body' => $this->request_data
        ];
        $response = $this->client->post($uri, $data);
        $this->response = $response;
    }

    /**
     * @Then the response content type should be :content_type
     */
    public function theResponseContentTypeShouldBe($content_type)
    {
        assertEquals($content_type, $this->response->getHeader('Content-Type'));
    }

    /**
     * @Then the response status code should be :response_code
     */
    public function theResponseStatusCodeShouldBe($response_code)
    {
        assertEquals($response_code, $this->response->getStatusCode());
    }

    /**
     * @Then the response should contain a :field_name entry
     */
    public function theResponseShouldContainAEntry($field_name)
    {
        assertArrayHasKey($field_name, $this->response->json());
    }

    /**
     * @Then the response entry :field_name should contain :contain_value
     */
    public function theResponseEntryShouldContain($field_name, $contain_value)
    {
        $response_data = $this->response->json();
        assertContains($contain_value, $response_data[$field_name]);
    }

    /**
     * @When the response entry :field_name should be :contain_value
     */
    public function theResponseEntryShouldBe($field_name, $contain_value)
    {
        $response_data = $this->response->json();
        assertEquals($contain_value, $response_data[$field_name]);
    }
}
