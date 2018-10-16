<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    //
    public function create(){
        return view('registration.create');
    }

    public function store(RegistrationRequest $form){
        // $form->persist();
        session()->flash('message', 'Thanks for signing up');
        // request()->session();
        // $this->validate(request(),[
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirmed'
        // ]);
        // $user = User::create(request(['name','email','password']));
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        auth()->login($user);
        \Mail::to($user)->send(new Welcome($user));
        return redirect()->home();
    }
}
