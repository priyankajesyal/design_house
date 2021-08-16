<?php

namespace Database\Seeders;

use App\Models\Milestone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         \App\Models\User::factory(1)->create();
         \App\Models\Admin::factory(1)->create();
         \App\Models\BankDetail::factory(1)->create();
        \App\Models\Banner::factory(4)->create();
        // \App\Models\Portfolio::factory(10)->create();
        // \App\Models\Proposal::factory(5)->create();

        Milestone::create([
            'title' => 'Kick Off',
            'price' => '',
            'type' => 'Fixed'
        ]);

        Milestone::create([
            'title' => 'Down Payment',
            'price' => '40',
            'type' => 'Percentage'
        ]);

        Milestone::create([
            'title' => 'Material Fabrication Done',
            'price' => '40',
            'type' => 'Percentage'
        ]);

        Milestone::create([
            'title' => 'Upon Installation',
            'price' => '10',
            'type' => 'Percentage'
        ]);

        Milestone::create([
            'title' => 'Upon Completion',
            'price' => '10',
            'type' => 'Percentage'
        ]);
    }
}