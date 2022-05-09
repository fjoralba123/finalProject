<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryConfiguration;

class CategoryConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CategoryConfiguration::factory(10)->create();
    }
}
