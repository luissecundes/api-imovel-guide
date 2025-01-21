<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param  \App\Http\Requests\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        return response()->json(['message' => 'POST AQUI'], 200);
    }
}
