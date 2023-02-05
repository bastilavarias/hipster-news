<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function generateData(Request $request) {
        $news = Http::withHeaders([
            "x-api-key" => 'seISLiJoKclrGBd2D-hewB84tJPbdK87jH1D-z6wSYQ',
            "Content-Type" => "application/json",
        ])
            ->get(
                "https://api.newscatcherapi.com/v2/search?q=Philippines&countries=PH&page_size=100",
            )
            ->json();

        foreach ($news['articles'] as $article) {
            News::create([
                'title' => $article['title'],
                'author' => $article['author'],
                'published_date' => $article['published_date'],
                'published_date_precision' => $article['published_date_precision'],
                'link' => $article['link'],
                'clean_url' => $article['clean_url'],
                'excerpt' => $article['excerpt'],
                'summary' => $article['summary'],
                'rights' => $article['rights'],
                'rank' => $article['rank'],
                'topic' => $article['topic'],
                'country' => $article['country'],
                'language' => $article['language'],
                'authors' => $article['authors'],
                'media' => $article['media'],
            ]);
        }
        return response()->json(News::all());
    }

    public function index(Request $request) {

        $paginated = $request->get('per_page', NULL);

        $data = News::query();

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
