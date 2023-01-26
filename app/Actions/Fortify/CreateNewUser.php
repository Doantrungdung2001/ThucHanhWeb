<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

            'ho_va_ten' => ['required', 'string', 'max:255'],
            'sdt' => ['required', 'numeric','digits:10'],
            'dia_chi' => ['required', 'string', 'max:255'],
            'ngay_sinh' => ['required','date','date_format:Y-m-d','before:'.now()->subYears(18)->toDateString()],
            
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'ho_va_ten' => $input['ho_va_ten'],
            'dia_chi' => $input['dia_chi'],
            'ngay_sinh' => $input['ngay_sinh'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
