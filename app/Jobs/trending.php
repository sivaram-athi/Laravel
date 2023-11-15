<?php

namespace App\Jobs;

use App\Buy;
use App\Trend;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class trending implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dd = Buy::Select('amazon_buys.product_id',DB::raw('count(amazon_buys.id) as count'))->groupBy('amazon_buys.product_id')->get();
        $array = $dd->filter(function($item){
            return $item->count > 3;
        });
        Trend::truncate();
        foreach ($array as $value) {
            Trend::create([
                'product_id'=> $value->product_id,
            ]);
        }
    }
}
