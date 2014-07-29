<?php

use Todo\Controllers\BaseApiController;
use Todo\Controllers\ResourceControllerInterface;

/**
 * Class UsersController
 */
class UsersController
    extends BaseApiController
    implements ResourceControllerInterface {

    /**
     * Return a listing of the resource
     *  Allows for query parameters for search/filtering via the GET parameters
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // @todo handle query strings/searchable_input
        $searchable_input = $this->getSearchableInput();
        $users = DummyUsers::makeUsers(mt_rand(2, 20));
        $this->addPaginationInfo($page = mt_rand(1,4), $total = mt_rand(30, 400));
        $this->setMessage('A message...');

        $this->addData('foo', ['bar' => 'baz']);
        $this->addData('baz', ['foo', 'bar']);
        $this->addData('users', $users->toArray());
        return $this->respondOk();
    }

    /**
     * @return array
     */
    public function getSearchableInput()
    {
        // @todo define way of defining searchable input
        $searchable_input = [
            'keyword' => 'some search term',
            'page'    => 2
        ];

        return $searchable_input;
    }

    /**
     * Create a new resource
     *  Requires the correct POST parameters
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function store()
    {
        // @todo validateStoreInput()
        // @todo Create resource
        $created_status = 202;
        $this->respondOk([], $created_status);
    }

    /**
     * Return a single resource
     * @param $identifier
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function show($identifier)
    {
        $user = DummyUsers::makeUsers(1)->first()->toArray();
        $user['id'] = $identifier;
        return $this->respondOk(compact('user'));
    }

    /**
     * Update a single resource
     * @param $identifier
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function update($identifier)
    {
        // @todo validateUpdateInput
        // @todo update resource
        $user = DummyUsers::makeUsers(1)->first()->toArray();
        $user['id'] = $identifier;
        return $this->respondOk(compact('user'));
    }

    /**
     * Destroy a single resource
     * @param $identifier
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function destroy($identifier)
    {
        // @todo Destroy resource
        $this->setMessage("Resource destroyed");
        $status_destroyed = 200; // @todo proper status
        return $this->respondOk([], 200);
    }

}