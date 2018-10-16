<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Mail\Welcome;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
            //
        ];
    }
    // public function persist()
    // {
    //     $user = User::create($this->only([
    //                 'name' => request('name'),
    //                 'email' => request('email'),
    //                 'password' => bcrypt(request('password'))
    //             ]));
    //     auth()->login($user);
    //     \Mail::to($user)->send(new Welcome($user));
    // }
}
