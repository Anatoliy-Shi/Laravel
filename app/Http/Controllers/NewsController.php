<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->select(
            News::$availableFields
        )->get();

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show($id)
    {
        $news = new News;
        return view('news.show', [
            'news' => $news->find($id),
        ]);

    }
}

