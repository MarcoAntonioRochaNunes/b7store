<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function deleteAd(Request $request, $id)
    {
        $ad = Advertise::find($id);

        if ($ad) {
            $ad->delete();
            dd('funfou');
        }

        dd('ta aqui', $id);
    }
}
