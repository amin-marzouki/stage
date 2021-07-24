<?php

namespace Database\Factories;

use App\Models\promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class promotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title'=>$this->faker->sentence,
            'description'=>$this->faker->paragraph(2),
            'type'=>$this->faker->sentence,
            'partenaire'=>$this->faker->word,
        ];
    }
}
