<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\State;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function myAccount()
    {
        $data['user'] = auth()->user();
        $data['states'] = State::all();
        return view('dashboard.myAccount', $data);
    }
    public function myAccountAction(UpdateProfileRequest $request)
    {

        $data = $request->only(['name', 'email', 'state_id']);

        $usuario = auth()->user();
        $usuario->update($data);

        return redirect()->route('my_account')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function myAds()
    {
        $user = auth()->user();
        $advertises = $user->advertise;



        // dd($advertises);

        return view('dashboard.myAds', compact('advertises'));
    }

    public function deleteAd()
    {

    }

}
