<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{

    /**
     * Storing the given User and his phone numbers.
     * @param Collection $data
     * @return User
     */
    public function storeUser(Collection $data)
    {
        return User::create([
            'email' => $data->get('email'),
            'name' => $data->get('name'),
            'dateOfBirth' => $data->get('dateOfBirth'),
        ]);
    }

    /**
     * Destroying the given User and his phone numbers.
     * @param User $user
     * @return bool
     */
    public function destroyUser(User $user)
    {
        return $user->delete();
    }

}
