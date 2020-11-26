<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PortaventuraController extends Controller
{

    public function pois(Request $request)
    {
        $response = Http::get('https://app.portaventuraworld.com/ws/filters/portaventura/atraccion/en');

        return response($response, 200)
            ->header('Content-Type', 'application/json');
    }

    public function waitTimes()
    {
        $response = Http::get('https://app.portaventuraworld.com/ws/filters/portaventura/atraccion/en');

        return response($response, $response->status())
            ->header('Content-Type', 'application/json');
    }

    public function openingTimes(Request $request)
    {
        $response = Http::get("https://www.portaventuraworld.com/page-data/en/dates-times/page-data.json");

        return response($response, $response->status())
            ->header('Content-Type', 'application/json');
    }
}
