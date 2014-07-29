<?php

namespace Todo\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


/**
 * Interface ResourceControllerInterface
 * @package app\Todo\Controllers
 */
interface ResourceControllerInterface {

    /**
     * Return a listing of the resource
     *  Allows for query parameters for search/filtering via the GET parameters
     * @return Response|JsonResponse
     */
    public function index();

    /**
     * @return array
     */
    public function getSearchableInput();

    /**
     * Create a new resource
     *  Requires the correct POST parameters
     * @return Response|JsonResponse
     */
    public function store();

    /**
     * Return a single resource
     * @param $identifier
     * @return Response|JsonResponse
     */
    public function show($identifier);

    /**
     * Update a single resource
     * @param $identifier
     * @return Response|JsonResponse
     */
    public function update($identifier);

    /**
     * Destroy a single resource
     * @param $identifier
     * @return Response|JsonResponse
     */
    public function destroy($identifier);

} 