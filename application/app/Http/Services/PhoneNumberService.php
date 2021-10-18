<?php

namespace App\Http\Services;

use App\Http\Resources\PhoneNumberResourceCollection;
use App\Models\User;
use App\Models\UserPhoneNumber;
use Illuminate\Support\Collection;

class PhoneNumberService
{
    public function storePhoneNumbers(User $user, Collection $data){

        $phoneNumbers = [];

        foreach ($data->get('phoneNumbers') as $phoneNumber){
            $phoneNumber=UserPhoneNumber::create([
                'phoneNumber'=>$phoneNumber,
                'userid'=>$user->userId
            ]);
            array_push($phoneNumbers, $phoneNumber);
        }

        return collect($phoneNumbers);
    }

    public function destroyPhoneNumbers(UserPhoneNumber $userPhoneNumber){
        return $userPhoneNumber->delete();
    }
}
