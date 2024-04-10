<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $query = Article::query();

        // Check if there's a search term
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%$searchTerm%")
                    ->orWhere('content', 'like', "%$searchTerm%");
            });
        }

        // Get paginated results
        $items = $query->paginate(10);

        // Pass the search term to the view
        $searchTerm = $request->search;

        return view('article.index', compact('items', 'searchTerm'));
    }

    public function create()
    {
        return view('article.create');
    }
    public function store(Request $request)
    {
        Article::create($request->only(['title', 'content']));

        return redirect()->route('article.index')->with(['function' => 'store']);
    }
    public function edit($id)
    {
        $item = Article::find($id);
        return view('article.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = Article::find($id);
        $item->update($request->only(['title',  'content']));

        return redirect()->route('article.index')->with(['function' => 'update']);
    }
    public function destroy($id)
    {
        $item = Article::find($id);
        $item->delete();
        return 'success';
    }
}
