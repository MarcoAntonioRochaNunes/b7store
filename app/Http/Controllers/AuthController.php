<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerAction(RegisterRequest $request)
    {

        $userData = $request->only(['name', 'password', 'email']);
        $userData['password'] = Hash::make($userData['password']);
        $user = User::create($userData);

        Auth::loginUsingId($user->id);

        return redirect()->route('select-state');
    }

    public function select_state()
    {
        $data['states'] = State::all();

        return view('auth.select-state', compact('data'));
    }
    public function select_state_action(Request $request)
    {
        $data = $request->only(['state']);
        $stateRegister = State::find($data['state']);

        if (!$stateRegister) {
            return redirect('/login');
        }

        $user = Auth::user();
        $user->state_id = $stateRegister->id;
        $user->save();
        return redirect()->route('home');

    }

    public function loginAction(LoginRequest $request)
    {
        $loginData = $request->only(['email', 'password']);

        if (!Auth::attempt($loginData)) {
            $data['message'] = 'Usuario ou Senha inválida';
            return view('auth.login', $data);
        }
        return redirect()->route('home');



    }
}
