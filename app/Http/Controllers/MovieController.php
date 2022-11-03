<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Services\FetchDataService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function index(): View
    {
        $movies = Movie::latest()->paginate(10);
        $buttons = config('buttons');
        return view('movies.index', compact('movies', 'buttons'));
    }

    public function create(): View
    {
        return view('movies.create');
    }

    public function store(CreateMovieRequest $request): void
    {
        Movie::create($request->validated());
        session()->flash('success', 'You have added a movie successfully');
    }

    public function edit(Movie $movie): View
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(UpdateMovieRequest $request, Movie $movie): void
    {
        $movie->update($request->validated());
        session()->flash('success', 'You have updated the record successfully');
    }

    public function destroy(Movie $movie): void
    {
        $movie->delete();
        session()->flash('success', 'You have deleted the record successfully');
    }

    public function fetchData($button): void
    {
        (new FetchDataService())->execute($button);
        session()->flash('success', 'You have fetched the data successfully.');
    }
}
