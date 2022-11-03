<?php

namespace App\Exports;

use App\Models\Timer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TrackerExport implements FromCollection, WithHeadings, WithMapping
{
    protected String $trackerId;

    public function __construct(string $trackerId)
    {
        $this->trackerId = $trackerId;
    }

    public function map($timer): array
    {
        return [
            $timer->title,
            $timer->notes,
            $timer->start,
            $timer->end,
            $timer->duration,
            $timer->edited,
            $timer->manual,
            $timer->deleted,
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Timer::where('tracker_id', $this->trackerId)->orderBy('start')->get();
    }

    public function headings(): array
    {
        return [
            'Title',
            'Notes',
            'Start',
            'End',
            'Duration',
            'Edited?',
            'Manual?',
            'Deleted?',
        ];
    }
}
