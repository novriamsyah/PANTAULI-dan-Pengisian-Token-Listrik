<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CobaEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $tegangan, $arus, $pf, $pf_sudah, $dy_aktif, $dy_reaktif, $dy_semu, $sisa_pulsa, $energi;
    /**
     * Create a new event instance.
     *
     * @return void
     */


    public function __construct($tegangan, $arus, $pf, $pf_sudah, $dy_aktif, $dy_reaktif, $dy_semu, $sisa_pulsa, $energi)
    {
        $this->tegangan = $tegangan;
        $this->arus = $arus;
        $this->pf = $pf;
        $this->pf_sudah = $pf_sudah;
        $this->dy_aktif = $dy_aktif;
        $this->dy_reaktif = $dy_reaktif;
        $this->dy_semu = $dy_semu;
        $this->sisa_pulsa = $sisa_pulsa;
        $this->energi = $energi;
    }

    
    public function broadcastOn()
    {
        return new Channel('message');
        // return new PrivateChannel('channel-name');
    }
    
    public function broadcastAs()
    {
        return 'my-event';
        // return new PrivateChannel('channel-name');
    }
}
