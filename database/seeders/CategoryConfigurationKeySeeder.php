<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryConfigurationKey;

class CategoryConfigurationKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CategoryConfigurationKey::factory(10)->create();

    }
}
