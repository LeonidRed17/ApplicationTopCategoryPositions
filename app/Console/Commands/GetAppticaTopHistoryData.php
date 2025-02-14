<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\AppticaTopPosition;

class GetAppticaTopHistoryData extends Command
{

    protected $signature = 'apptica:get-top-history {date_from=2025-01-24} {date_to=2025-02-14}';
    protected $description = 'Получение данных из Apptica для указанного периода';

    public function handle()
    {
        $dateFrom = $this->argument('date_from');
        $dateTo = $this->argument('date_to');

        // Данные для запроса
        $applicationId = '1421444';
        $countryId = '1';
        $token = 'fVN5Q9KVOlOHDx9mOsKPAQsFBlEhBOwguLkNEDTZvKzJzT3l';

        // Отправляем запрос
        $response = Http::withOptions([
            'verify' => false, // Отключаем проверку SSL-сертификатов
        ])->get("https://api.apptica.com/package/top_history/{$applicationId}/{$countryId}", [
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'B4NKGg' => $token,
        ]);

        if ($response->successful()) {
            $responseData = $response->json();

            $this->info('Данные получены успешно');

            $dataArray = $responseData['data'];


            if (!empty($responseData['data'])) {
                foreach ($responseData['data'] as $categoryId => $subcategoryData) {
                    foreach ($subcategoryData as $subcategoryId => $dates) {
                        foreach ($dates as $date => $position) {
                            if ($position !== null  && !empty($date)) {
                                AppticaTopPosition::create([
                                    'date_from' => $date,
                                    'date_to' => $date,  
                                    'position' => $position, 
                                    'category' => $categoryId,
                                    'subcategory' => $subcategoryId,
                                ]);
                                $this->info("Запись для категории {$categoryId}, подкатегории {$subcategoryId} на дату {$date} добавлена с позицией {$position}.");
                            }
                        }
                    }
                }
            } else {
                $this->error('Нет данных для добавления.');
            }
            //dd($dataArray);


            /*
            foreach ($responseData as $testcategories) {
                echo $testcategories;
            }
*/
            //$this->line($parsedResponseData);
        }
    }
}
