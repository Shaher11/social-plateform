<?php

namespace App\Console\Commands;

use App\Code;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CodeExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $codes = Code::all();
        foreach ($codes as $code) {
            if (Carbon::now() > $code->created_at->addDays(2)) {
                $code->status = 0;
                $code->save();
            }
        }
    }
}
