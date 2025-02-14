<?php

namespace App\Http\Controllers;

use App\Services\AppTopCategoryService;

class MainController extends Controller
{
    protected $appTopCategoryService;

    public function __construct(AppTopCategoryService $appTopCategoryService)
    {
        $this->appTopCategoryService = $appTopCategoryService;
    }

    public function getAppTopCategory($date)
    {
        $positions = $this->appTopCategoryService->getTopCategoryByDate($date);

        return response()->json($positions);
    }
}
