<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class CategoryConfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'category_id'=>$this->faker->randomDigit(),
            'key'=>$this->faker->randomElement($array = array ('Aut voluptatem qui.','Quos officiis.','Hic similique.')),
            'type'=>$this->faker->text(10),
            'value'=>$this->faker->text(20),





                //



        ];
    }
}
