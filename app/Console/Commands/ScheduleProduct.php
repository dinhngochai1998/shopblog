<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class ScheduleProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create product everyday';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product = Product::where('schedule_status', '=', 2)->get();
        
        $product->each(function ($item) {
            // Kiểm tra các $item article nếu thời gian nhỏ hơn hoặc bằng hiện tại
            // => publish
            if ($item->schedule_product <= now()) {
                $item->schedule_status = 1;
                // Lưu lại
                $item->save();
            }
        });
    }
}
