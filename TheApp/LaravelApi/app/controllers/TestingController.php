<?php

use Todo\Controllers\BaseApiController;
use Todo\Controllers\ResourceControllerInterface;

/**
 * Class TestingController
 */
class TestingController extends BaseApiController {

    public function index()
    {
        $data = [
          'foo' => 'bar',
          'message' => 'Well Hello World!'
        ];
        return $this->respondOk($data);
    }

}