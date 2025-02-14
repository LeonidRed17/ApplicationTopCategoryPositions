<?php

namespace App\Http\Controllers;

use App\Models\AppticaTopPosition;

class MainController extends Controller
{
    public function getAppTopCategory($date)
    {
        $positions = AppticaTopPosition::where('date_from', '=', $date)
            ->select('category', 'position')
            ->get()
            ->sortBy('position')
            ->groupBy('category') 
            ->map(function ($group) {
                return implode(',', $group->pluck('position')->toArray());  // Преобразуем позиции в строку через запятую
            });

        return response()->json($positions);

    }
}
