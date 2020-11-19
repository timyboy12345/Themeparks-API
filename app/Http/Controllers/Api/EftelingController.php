<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EftelingController extends Controller
{
    public function pois(Request $request)
    {
        $lang = $request->get('lang', 'nl');
        $response = Http::get("http://prd-search-acs.efteling.com/2013-01-01/search?size=1000&q.parser=structured&q=(phrase field=language '${lang}')");

        return response($response, $response->status())
            ->header('Content-Type', 'application/json');
    }

    public function waitTimes()
    {
        $response = Http::get('https://api.efteling.com/app/wis/');

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
