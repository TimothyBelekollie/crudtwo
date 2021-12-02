<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
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
            'title'=>$this->faker->sentence,// Generates a fake sentence
            'body'=>$this->faker->paragraph(30), //generates fake 30 paragrahps
            'user_id'=>User::factory()//Generates a User from the factor and extracts id 
        ];
    }
}
