<?php

namespace App\Services;

use App\Models\AppticaTopPosition;

class AppTopCategoryService
{
    public function getTopCategoryByDate($date)
    {
        return AppticaTopPosition::where('date_from', '=', $date)
            ->select('category', 'position')
            ->get()
            ->sortBy('position')
            ->groupBy('category') 
            ->map(function ($group) {
                return implode(',', $group->pluck('position')->toArray()); 
            });
    }
}
