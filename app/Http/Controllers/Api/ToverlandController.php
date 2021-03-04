<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ToverlandController extends Controller
{
    private $toverlandApiEndpoint = "https://api.toverland.com/v1";
    private $toverlandApiToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI4IiwianRpIjoiMTRlZDg0MjdhOTk3ZWFjNzlkMjFlMzQ3NWZjYjU0YmY2MGNjZDA2MTg4NWQ5MGNhNTc2OGQ1YzNkNTRhMzFmMmJlNGU2OTE1MGEwYmNmZjkiLCJpYXQiOjE2MDAxNTYzMTgsIm5iZiI6MTYwMDE1NjMxOCwiZXhwIjoxNjMxNjkyMzE4LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.EvvdV2Faf1XLvLthDkgEfuC_GCEzP0fDwiWocWB7wwM5U00uuuDnXD_RKw1ts0awzL4mZu-65INP7mx2rupHDCkI_5wbFHf_bHuduCjUVHgYvaJ_XGpYjjhHqGLI5K2LZ6GEv5w2EonY3-SG7Y54uS7diXcu9xRwpKXX7PU2yVOw-xJA9ayfWaRHRdlyi1LAWe67Q9Y8oJiaDVDHGhYCgxOHhlfUqKkFyVJVCruKbVoLGFLL9tpk6mxpp_b14GUsiCjmsk9e0BSZZ9I3h4UVhpc9MvkofCsczgfABgyZp71fWvpuF-k0H1veoqoL2C4hdkZizlcGkhryV05i7KaflJezZ554xoFj5DJgxoLmStHTlaKF6l4740aJ-iuSNn2XvV3jKLbKy-t8aNWeCiuqMmRnPlHSnqYC2Yqz4XMUx3z3IVLsQj2ig3EVVAWafGiWxaFc6JyiGtIo7O_beJtIfcvwy_A7ytb0jt13zWwQHw32KQplo0XL7YGxinM3hialUhKSpSuVpwGQgrG68UnU1kkAq5n5P38vvXa1tAKsXnANuc2aDje1s20umKThmT-b728UoJ-moZ9MHpqEhqxsRjVoFSK2Uhnok_vtm-Uf7GAFIHuGVlsKa-r8gdnATHQgE5gxO7N8EFTt_1wFFl3vMjAwp9xJpw9hPgwAQ6ww210';

    public function pois(Request $request)
    {
        $request->validate([
            'lang' => 'nullable|string|in:nl,en,fr'
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->toverlandApiToken
        ])->get("{$this->toverlandApiEndpoint}/park/ride/operationInfo/list");

        return response($response, $response->status())
            ->header('Content-Type', 'application/json');
    }

    public function waitTimes()
    {
        return $this->pois(new Request());
    }
}