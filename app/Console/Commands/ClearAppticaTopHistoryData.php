<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AppticaTopPosition;

class ClearAppticaTopHistoryData extends Command
{
    protected $signature = 'apptica:clear-top-history {date_from?} {date_to?}';
    protected $description = 'Удалить данные из AppticaTopPosition за указанный период';


    public function handle()
    {
        $dateFrom = $this->argument('date_from');
        $dateTo = $this->argument('date_to');

        $query = AppticaTopPosition::query();

        if ($dateFrom) {
            $query->where('date_from', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->where('date_to', '<=', $dateTo);
        }

        $count = $query->count();

        if ($count > 0) {
            $query->delete();
            $this->info("Удалено записей: {$count}");
        } else {
            $this->info('Нет данных для удаления.');
        }
    }
}
