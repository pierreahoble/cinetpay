<?php

namespace App\Jobs;

use App\Traits\PaiementTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CinetpayJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, PaiementTrait;
    
    public $marchand;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($marchand)
    {
        $this->marchands = $marchand;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        PaiementTrait::payCinetPay($this->marchand);
    }
}
