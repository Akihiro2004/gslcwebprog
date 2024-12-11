<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function home()
    {
        $movies = Movie::paginate(4);
        return view('home', ['movies' => $movies]);
    }

    public function form()
    {
        $genres = Genre::all();
        return view('form', ['genres' => $genres]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'genre_id' => 'required|exists:genres,id',
            'photo' => 'required|image|max:5120',
            'title' => 'required|max:30',
            'description' => 'required|max:50',
            'publish_date' => 'required|date|before_or_equal:today',
        ]);

        $photo = $request->file('photo');
        $path = $photo->store('movies', 'public');

        Movie::create([
            'genre_id' => $request->genre_id,
            'title' => $request->title,
            'photo' => $path,
            'publish_date' => $request->publish_date,
            'description' => $request->description,
        ]);

        return redirect()->route('movies.home')
            ->with('success', 'Movie added successfully');
    }

    public function destroy(Movie $movie)
    {
        Storage::disk('public')->delete($movie->photo);
        $movie->delete();

        return redirect()->route('movies.home')
            ->with('success', 'Movie deleted successfully');
    }
}
