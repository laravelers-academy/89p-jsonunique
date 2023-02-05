<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    
    public function create(CreateRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'payload' => [
                'rfc' => $request->rfc
            ]
        ]);

        return $user;

    }

    public function update(UpdateRequest $request)
    {

        $user = User::findOrFail($request->user_id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'payload' => [
                'rfc' => $request->rfc
            ]
        ]);

        return $user;

    }

}
