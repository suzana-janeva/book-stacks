<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStackRequest;
use App\Models\BookStack;
use App\Repositories\BookStackRepository;
use App\Services\StacksService;
use Illuminate\Http\Request;

class BookStackController extends Controller
{
    public function index()
    {
        $bookStacks = BookStack::orderBy('created_at', 'desc')->get();

        return view('book-stacks.index', compact('bookStacks'));
    }

    public function store(BookStackRequest $request, StacksService $service, BookStackRepository $repo)
    {
        $validated = $request->validated();

        $grid = array_map(fn($row) => array_map('intval', $row), $validated['grid_data']);

        $gridSize = $validated['grid_size'];

        // Calculate visible stacks
        $visibleStacks = $service->countVisibleStacks($grid, $gridSize);

        // Save to database
        $repo->saveBookStack($gridSize, $grid, $visibleStacks);

        return redirect()->route('bookstacks.index')->with('success', "Visible stacks: $visibleStacks");
    }
}
