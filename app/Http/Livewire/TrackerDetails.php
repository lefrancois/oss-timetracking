<?php

namespace App\Http\Livewire;

use App\Exports\TrackerExport;
use App\Models\Timer;
use App\Models\Tracker as TrackerModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TrackerDetails extends Component
{
    public bool $editTitle = false;

    public TrackerModel $tracker;

    protected $listeners = ['refreshTracker' => '$refresh'];

    protected $rules = [
        'tracker.title' => 'nullable|string|max:250',
    ];

    public function saveTitle()
    {
        $this->validate();
        $this->tracker->save();
        $this->editTitle = false;
    }

    public function downloadQrCode()
    {
        return response()->streamDownload(function () {
            echo QrCode::format('png')->size(1000)->generate(url('/t/'.$this->tracker->identifier));
        }, 'cosu-timetracker-'.$this->tracker->identifier.'.png');
    }

    public function startTimer()
    {
        Timer::create([
            'tracker_id' => $this->tracker->id,
            'start' => Carbon::now(),
        ]);
        $this->emit('refreshTracker');
    }

    public function createManualTimer()
    {
        $this->emit('openEditor', 'new');
    }

    public function export(string $format)
    {
        $export = new TrackerExport($this->tracker->id);
        if ($format == 'json') {
            $res = Timer::where('tracker_id', $this->tracker->id)->orderBy('start')->select('title', 'notes', 'start', 'end', 'duration', 'edited', 'manual', 'deleted')->get();
            Storage::disk('public')->put('/temp/tracker-'.$this->tracker->identifier.'.json', json_encode($res));

            return response()->download('storage/temp/tracker-'.$this->tracker->identifier.'.json')->deleteFileAfterSend();
        }
        $excel = match ($format) {
            'xlsx' => \Maatwebsite\Excel\Excel::XLSX,
            'xls' => \Maatwebsite\Excel\Excel::XLS,
            'csv' => \Maatwebsite\Excel\Excel::CSV,
            'pdf' => \Maatwebsite\Excel\Excel::DOMPDF,
            'html' => \Maatwebsite\Excel\Excel::HTML,
        };

        return Excel::download($export, 'tracker-'.$this->tracker->identifier.'.'.$format, $excel);
    }

    public function render()
    {
        return view('livewire.tracker-details');
    }
}
