<?php

namespace App\Jobs;

use App\Events\ReportGeneratedEvent;
use App\Mail\ReportGeneratedMail;
use App\Models\User;
use App\Services\CalculateStatisticsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class GenerateReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private array $whatToCalculate, private User $adminRequested)
    {

    }

    public function handle(CalculateStatisticsService $calculateStatisticsService)
    {
        $stats = $calculateStatisticsService->getStatistics($this->whatToCalculate);
        Storage::disk('reports')->put("report.csv", $this->getCSVFormat($stats));
        Event::dispatch(new ReportGeneratedEvent());
    }

    private function getCSVFormat(array $stats)
    {
        $csv = fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');
        fputcsv($csv, $stats);
        rewind($csv);
        return stream_get_contents($csv);
    }
}
