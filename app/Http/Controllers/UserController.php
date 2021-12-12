<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::all());
    }

    public function store(StoreUserRequest $request): UserResource
    {
        $user = User::create(
            array_merge(
                $request->only('full_name', 'email'),
                [
                    'password' => bcrypt($request->password),
                ]
            )
        );

        return UserResource::make($user);
    }
}
