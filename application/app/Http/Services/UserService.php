<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    public function storeUser(Collection $data){
        return User::create([
            'userId'=>$data->get('userId'),
            'name'=>$data->get('name'),
            'email'=>$data->get('email'),
            'dateOfBirth'=>$data->get('dateOfBirth'),
        ]);
    }

    public function destroyUser(User $user){
        return $user->delete();
    }

}
