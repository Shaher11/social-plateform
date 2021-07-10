<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pending = Status::create([
            'name' => 'pending'
        ]);
        $processing = Status::create([
            'name' => 'processing'
        ]);
        $need_details = Status::create([
            'name' => 'need_details'
        ]);
        $finished = Status::create([
            'name' => 'finished'
        ]);
        $cancelled = Status::create([
            'name' => 'cancelled'
        ]);
    }
}
