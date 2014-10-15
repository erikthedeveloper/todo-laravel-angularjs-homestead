<?php

use Todo\Controllers\BaseApiController;
use Todo\Controllers\ResourceControllerInterface;

/**
 * Class TestingController
 * @author Erik Aybar
 */
class TestingController extends BaseApiController
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'foo'     => 'bar',
            'message' => 'Well Hello World!'
        ];
        return $this->respondOk($data);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function echo_post()
    {
        $data = Input::all();
        return $this->respondOk($data);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function echo_get()
    {
        $message = Input::get('message');
        $data = array_merge(
            Input::all(),
            ['echo' => "Echo: {$message}"]
        );
        return $this->respondOk($data);
    }
}