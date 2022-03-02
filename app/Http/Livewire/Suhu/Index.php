<?php

namespace App\Http\Livewire\Suhu;

use Livewire\Component;
use App\Suhu;

class Index extends Component
{
    public function render()
    {
        $suhu_db = Suhu::select('suhus.temp')
    	->orderBy('suhus.temp', 'DESC')
    	->take(6)
    	->get();
        // $suhu_db = Suhu::pluck('temp');
        $suhu_data = Suhu::latest()
    	->take(6)
    	->get()
        ->sortBy('id');
        $suhu_creat = Suhu::select('suhus.created_at')
    	->orderBy('suhus.created_at', 'DESC')
    	->take(6)
    	->get();
        return view('livewire.suhu.index', compact('suhu_db', 'suhu_data', 'suhu_creat'));
    }
}
