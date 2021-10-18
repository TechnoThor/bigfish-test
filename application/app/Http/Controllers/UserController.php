<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneNumberRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\PhoneNumberResourceCollection;
use App\Http\Resources\UserResource;
use App\Http\Services\PhoneNumberService;
use App\Http\Services\UserService;
use App\Models\User;
use App\Models\UserPhoneNumber;

class UserController extends Controller
{

    protected $userService;
    protected $phoneNumberService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->phoneNumberService = new PhoneNumberService();
    }

    public function storeUser(UserRequest $request){
        $user = $this->userService->storeUser(collect($request));

        $this->phoneNumberService->storePhoneNumbers($user, collect($request));

        return new UserResource($user);
    }

    public function storePhoneNumbers(User $user, PhoneNumberRequest $request){

        new PhoneNumberResourceCollection($this->phoneNumberService->storePhoneNumbers($user, collect($request)));
    }

    public function destroyUser(User $user){
        return $this->userService->destroyUser($user);
    }

    public function destroyPhoneNumbers(UserPhoneNumber $userPhoneNumber){
        $this->phoneNumberService->destroyPhoneNumbers($userPhoneNumber);
    }
}
