<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Retrieve all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    /**
     * Retrieve a specific user by ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->id);
        return response()->json(['user' => $user], 200);
    }

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

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'nullable|string|max:255',
            'cpf' => 'nullable|string|max:11|unique:users,cpf,' . $request->id,
            'creci' => 'nullable|string|min:2',
        ]);

        $user = User::findOrFail($request->id);
        $user->update($request->only(['name', 'cpf', 'creci']));

        return response()->json(['user' => $user], 200);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
