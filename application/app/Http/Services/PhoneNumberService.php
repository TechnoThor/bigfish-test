<?php

namespace App\Http\Services;

use App\Http\Resources\PhoneNumberResourceCollection;
use App\Models\User;
use App\Models\UserPhoneNumber;
use Illuminate\Support\Collection;

class PhoneNumberService
{
    /**
     * Storing phone numbers for the given User.
     * @param User $user
     * @param Collection $data
     * @return Collection
     */
    public function storePhoneNumbers(User $user, Collection $data)
    {

        $phoneNumbers = [];

        foreach ($data->get('phoneNumbers') as $phoneNumber) {
            $phoneNumber = UserPhoneNumber::create([
                'phoneNumber' => $phoneNumber,
                'userId' => $user->userId
            ]);
            array_push($phoneNumbers, $phoneNumber);
        }

        return collect($phoneNumbers);
    }

    /**
     * Destroying the given phone number.
     * @param UserPhoneNumber $userPhoneNumber
     * @return bool|null
     */
    public function destroyPhoneNumbers(UserPhoneNumber $userPhoneNumber)
    {
        return $userPhoneNumber->delete();
    }
}
