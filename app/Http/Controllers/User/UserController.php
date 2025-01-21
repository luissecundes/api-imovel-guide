<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param  \App\Http\Requests\User\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'creci' => $request->creci,
        ]);

        return response()->json(['user' => $user], 201);
    }

}
