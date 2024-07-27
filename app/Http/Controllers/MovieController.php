<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Gene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        
        if ($searchTerm) {
            $movies = Movie::where('title', 'LIKE', "%{$searchTerm}%")
                            ->with('gene')
                            ->paginate(6);
        } else {
            $movies = Movie::with('gene')->paginate(6);
        }

        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $genes = Gene::all();
        return view('movies.create', compact('genes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'intro' => 'required|string',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genes,id',
        ]);

        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->intro = $request->input('intro');
        $movie->release_date = $request->input('release_date');
        $movie->genre_id = $request->input('genre_id');

        // Handle poster upload
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $path = $file->store('posters', 'public');
            $movie->poster = $path;
        }

        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Movie added successfully.');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }


    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genes = Gene::all();
        return view('movies.edit', compact('movie', 'genes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'intro' => 'required|string',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genes,id',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->intro = $request->input('intro');
        $movie->release_date = $request->input('release_date');
        $movie->genre_id = $request->input('genre_id');

        // Handle poster upload
        if ($request->hasFile('poster')) {
            // Delete old poster if exists
            if ($movie->poster && Storage::exists('public/' . $movie->poster)) {
                Storage::delete('public/' . $movie->poster);
            }

            // Store new poster
            $file = $request->file('poster');
            $path = $file->store('posters', 'public');
            $movie->poster = $path;
        }

        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
