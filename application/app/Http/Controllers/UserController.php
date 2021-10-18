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

    /**
     * Returning with User and his phone numbers.
     *
     *
     * @param User $user
     * @return UserResource
     */
    public function getUser(User $user){
        return new UserResource($user);
    }

    /**
     * Storing the user with his Phone numbers.
     *
     *
     * @param UserRequest $request
     * @return UserResource
     */
    public function storeUser(UserRequest $request){
        $user = $this->userService->storeUser(collect($request));

        if ($request->has('phoneNumbers')){
            $this->phoneNumberService->storePhoneNumbers($user, collect($request));
        }

        return new UserResource($user);
    }

    /**
     * Storing Phone numbers for the given User.
     *
     *
     * @param User $user
     * @param PhoneNumberRequest $request
     * @return PhoneNumberResourceCollection
     */
    public function storePhoneNumbers(User $user, PhoneNumberRequest $request){
        return new PhoneNumberResourceCollection($this->phoneNumberService->storePhoneNumbers($user, collect($request)));
    }

    /**
     * Destroying the User and his phone numbers.
     *
     *
     * @param User $user
     * @return bool|null
     */
    public function destroyUser(User $user){
        return $this->userService->destroyUser($user);
    }

    /**
     * Destroying the given phone number.
     *
     *
     * @param User $user
     * @param UserPhoneNumber $phoneNumber
     * @return bool|null
     */
    public function destroyPhoneNumbers(User $user, UserPhoneNumber $phoneNumber){
        return $this->phoneNumberService->destroyPhoneNumbers($phoneNumber);
    }
}
