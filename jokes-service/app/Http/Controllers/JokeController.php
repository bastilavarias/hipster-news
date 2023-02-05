<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JokeController extends Controller
{
    public function generateData(Request $request) {

        for ($x = 0; $x <= 100; $x++) {
            $joke = Http::withHeaders([
                "Accept" => "application/json",
            ])
                ->get(
                    "https://icanhazdadjoke.com/",
                )
                ->json();


            Joke::create(['joke' => $joke['joke']]);
        }

        return response()->json(Joke::all());
    }

    public function index(Request $request) {
        $paginated = $request->get('per_page', NULL);

        $data = Joke::query();

        $data = $data->when($paginated,
            function ($query) use ($paginated) {
                return $query->paginate($paginated);
            },
            function ($query) {
                return $query->get();
            }
        );

        return response()->json($data);
    }
}
