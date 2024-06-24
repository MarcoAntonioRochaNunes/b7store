<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function deleteAd($id)
    {
        $ad = Advertise::where('user_id', Auth::user()->id)->first();

        if ($ad) {
            // AdvertiseImage::where('advertise_id', $ad->id)->delete();
            $ad->delete();

            return redirect()->back();
        } else {
            return redirect()->route('home');
        }

    }

    public function show($slug)
    {
        $ad = Advertise::where('slug', $slug)->first();

        if (!$ad) {
            return redirect()->route('home');
        }
        $ad->views++;
        $ad->save();

        $related = Advertise::where('category_id', $ad->category_id)
            ->where('state_id', $ad->state_id)
            ->where('id', '<>', $ad->id)
            ->orderBy('created_at', 'desc')
            ->orderBy('views', 'desc')
            ->with('images')
            ->limit(4)
            ->get();

        return view('single-ad', compact('ad', 'related'));
    }
}
