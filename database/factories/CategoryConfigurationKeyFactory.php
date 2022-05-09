<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryConfigurationKeyFactory extends Factory
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

            'name'=>$this->faker->unique()->text(20),
            'extra'=>json_encode([
                $this->faker->randomElement(
                     [
                       "extra1 ",
                       "extra 2 ",
                       "extra 3",

                     ]
                     )]),




        ];
    }
}
