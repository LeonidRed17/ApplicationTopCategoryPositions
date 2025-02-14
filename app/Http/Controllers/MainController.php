<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    protected $applicationId = '1421444';
    protected $countryId = '1';
    protected $token = 'fVN5Q9KVOlOHDx9mOsKPAQsFBlEhBOwguLkNEDTZvKzJzT3l';


    public function getAppticaTopHistoryData(Request $request)
    {

        $dateFrom = $request->input('date_from', '2025-01-21');
        $dateTo = $request->input('date_to', '2025-01-23');

        $response = Http::withOptions([
            'verify' => false,
        ])->get("https://api.apptica.com/package/top_history/{$this->applicationId}/{$this->countryId}", [
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'B4NKGg' => $this->token,
        ]);

        if ($response->successful()) {
            return $response->json();
        }
        return response()->json(['error' => 'Не удалось получить данные'], $response->status());
    }
}
