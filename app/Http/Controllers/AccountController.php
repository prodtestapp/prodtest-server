<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccountRequest;
use App\Http\Resources\UserResource;

class AccountController extends Controller
{
    public function update(UpdateAccountRequest $request): UserResource
    {
        $user = auth()->user();

        $user->update($request->validated());

        return UserResource::make($user);
    }
}
