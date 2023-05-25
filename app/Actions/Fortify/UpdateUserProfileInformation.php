<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'email', 'max:255', 
                Rule::unique('users')->ignore($user->id),
            ],
            'region' => ['required', 'string'],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'barangay' => ['required', 'string'],
            'phone' => ['nullable', 'numeric', 'min:11'],
            'photo' => ['nullable', 'image', 'max:1024'],
            ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'region' => $input['region'],
            'province' => $input['province'],
            'city' => $input['city'],
            'barangay' => $input['barangay'],
            'phone' => $input['phone'],
        ]);

        if ($user instanceof MustVerifyEmail && $input['email'] !== $user->email) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->email_verified_at = null;
        $user->save();

        $user->sendEmailVerificationNotification();
    }
}