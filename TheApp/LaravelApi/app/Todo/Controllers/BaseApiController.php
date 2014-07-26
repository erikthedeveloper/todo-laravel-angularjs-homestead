<?php

namespace Todo\Models\Controllers;


use Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Redirect;

/**
 * Class BaseApiController
 * @package Todo\Models\Controllers
 * @todo Pagination
 */
abstract class BaseApiController extends Controller {

    /**
     * @var string
     */
    protected $response_format = "json";
    /**
     * @var array
     */
    protected $data = [];

    /**
     * This function does awesomeness...
     * @param array $data
     * @param       $status
     * @param array $headers
     * @throws \Exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function respond(array $data, $status, array $headers = [])
    {
        /**
         * @todo Write function and update PHPDoc
         */
        $data = array_merge_recursive($this->data, $data);

        return $this->makeResponse($data, $status, $headers);
    }

    /**
     * This function does awesomeness...
     * @param array $data
     * @param int   $status
     * @return \Illuminate\Http\Response
     */
    public function respondOk(array $data, $status = Response::HTTP_OK)
    {
        return $this->respond($data, $status);
    }

    /**
     * This function does awesomeness...
     * @param string $message
     * @internal param int $status
     * @return \Illuminate\Http\Response
     */
    public function respondNotFound($message = "Not found")
    {
        $data = [
            'message' => $message
        ];
        $status = Response::HTTP_NOT_FOUND;

        return $this->respond($data, $status);
    }

    /**
     * This function does awesomeness...
     * @param array $data
     * @param int   $status
     * @return \Illuminate\Http\Response
     */
    public function respondUnauthorized(array $data = [], $status = Response::HTTP_UNAUTHORIZED)
    {
        return $this->respond($data, $status);
    }

    /**
     * This function does awesomeness...
     * @todo Implement JobPiper\Validation\ValidationErrors and use for $errors
     * @param array $errors
     * @param int   $status
     * @return \Illuminate\Http\Response
     */
    public function respondValidationErrors(array $errors, $status = Response::HTTP_BAD_REQUEST)
    {
        $data = [
            'validation_errors' => $errors
        ];

        return $this->respond($data, $status);
    }

    /**
     * This function does awesomeness...
     * @param string $path
     * @param int    $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function respondRedirect($path, $status = Response::HTTP_TEMPORARY_REDIRECT)
    {
        return Redirect::to($path, $status);
    }

    /**
     * @return string
     */
    public function getResponseFormat()
    {
        return $this->response_format;
    }

    /**
     * @param string $format
     */
    public function setResponseFormat($format)
    {
        $this->response_format = $format;
    }

    /**
     * @param array  $data
     * @param int    $status
     * @param array  $headers
     * @param string $response_format
     * @throws \Exception
     * @return Response|JsonResponse
     */
    public function makeResponse(array $data, $status, array $headers, $response_format = null)
    {
        $response_format = $response_format ?: $this->response_format;
        switch ($response_format)
        {
            case 'json':
                return $this->makeJsonResponse($data, $status, $headers);
                break;
            default:
                throw new Exception("Response format {$this->response_format} not valid or not yet implemented");
                break;
        }
    }

    /**
     * @param $data
     * @param $status
     * @param $headers
     * @return JsonResponse
     */
    public function makeJsonResponse($data, $status, $headers)
    {
        return ResponseFacade::json($data, $status, $headers);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param array $data
     */
    public function mergeData(array $data)
    {
        $this->data = array_merge_recursive($this->getData(), $data);
    }

}