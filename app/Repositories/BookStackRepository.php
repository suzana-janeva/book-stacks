<?php

namespace App\Repositories;

use App\Models\BookStack;

class BookStackRepository
{
    public function saveBookStack(int $gridSize, array $gridData, int $visibleStacks): BookStack
    {
        return BookStack::create([
            'grid_size' => $gridSize,
            'grid_data' => $gridData,
            'visible_stacks' => $visibleStacks,
        ]);
    }
}
