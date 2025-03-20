<?php
namespace App\Services;

class StacksService
{

    public function countVisibleStacks(array $grid, int $number): int
    {
        $visibleStacks = 0;

        $visible = array_fill(0, $number, array_fill(0, $number, false));

        // Left to Right
        for ($i = 0; $i < $number; $i++) {
            $maxHeight = 0;
            for ($j = 0; $j < $number; $j++) {
                if ($grid[$i][$j] > $maxHeight) {
                    if (!$visible[$i][$j]) {
                        $visibleStacks++;
                        $visible[$i][$j] = true;
                    }
                    $maxHeight = $grid[$i][$j];
                }
            }
        }

        // Right to Left 
        for ($i = 0; $i < $number; $i++) {
            $maxHeight = 0;
            for ($j = $number - 1; $j >= 0; $j--) {
                if ($grid[$i][$j] > $maxHeight) {
                    if (!$visible[$i][$j]) {
                        $visibleStacks++;
                        $visible[$i][$j] = true;
                    }
                    $maxHeight = $grid[$i][$j];
                }
            }
        }

        // Top to Bottom
        for ($j = 0; $j < $number; $j++) {
            $maxHeight = 0;
            for ($i = 0; $i < $number; $i++) {
                if ($grid[$i][$j] > $maxHeight) {
                    if (!$visible[$i][$j]) {
                        $visibleStacks++;
                        $visible[$i][$j] = true;
                    }
                    $maxHeight = $grid[$i][$j];
                }
            }
        }

        // Bottom to Top
        for ($j = 0; $j < $number; $j++) {
            $maxHeight = 0;
            for ($i = $number - 1; $i >= 0; $i--) {
                if ($grid[$i][$j] > $maxHeight) {
                    if (!$visible[$i][$j]) {
                        $visibleStacks++;
                        $visible[$i][$j] = true;
                    }
                    $maxHeight = $grid[$i][$j];
                }
            }
        }

        return $visibleStacks;
    }
}