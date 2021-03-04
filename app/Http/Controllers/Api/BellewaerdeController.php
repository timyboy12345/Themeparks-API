<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BellewaerdeController extends Controller
{
    public function pois(Request $request)
    {
        $rides = file_get_contents(public_path("data/bellewaerde_pois.json"));

        return response($rides, 200)
            ->header('Content-Type', 'application/json');
    }

    public function waitTimes()
    {
        $response = Http::get('http://bellewaer.de/realtime/api/api-realtime.php');

        return response($response, $response->status())
            ->header('Content-Type', 'application/json');
    }

    public function openingTimes(Request $request)
    {
        $request->validate([
            'year' => 'nullable|number|min:2020',
            'month' => 'nullable|number|min:1|max:12'
        ]);

        $response = Http::get("https://www.efteling.com/service/cached/getpoiinfo/nl/{$request->input('year', date('Y'))}/{$request->input('month', date('M'))}");

        return response($response, $response->status())
            ->header('Content-Type', 'application/json');
    }
}
