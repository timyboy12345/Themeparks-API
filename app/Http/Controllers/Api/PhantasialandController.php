<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PhantasialandController extends Controller
{
    public function pois(Request $request)
    {
        $lang = $request->get('lang', 'nl');

        $apiToken = "auiJJnDpbIWrqt2lJBnD8nV9pcBCIprCrCxaWettkBQWAjhDAHtDxXBbiJvCzkUf";

        $response = Http::get("https://api.phlsys.de/api/pois?filter[where][seasons][like]=%25SUMMER%25&compact=true&access_token=${apiToken}");

        return response($response, $response->status())
            ->header('Content-Type', 'application/json');
    }

    public function waitTimes()
    {
        $latMax = 50.800659529;
        $latMin = 50.799683077;
        $lngMax = 6.878342628;
        $lngMin = 6.877570152;

        $lat = rand($latMin, $latMax);
        $lng = rand($lngMin, $lngMax);

        $response = Http::get("https://api.phlsys.de/api/signage-snapshots?loc=${latMax},${lngMax}&compact=true&access_token=8cbWt6gu8aEG2VLvDVS9G2dj5rjjnrBuExxbLHQEEoG6zgS0BYqy8eFyaKcZ8ZCH");

        return response($response, $response->status())
            ->header('Content-Type', 'application/json');
    }
}
