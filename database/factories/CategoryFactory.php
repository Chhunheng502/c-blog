<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $admins = \App\Models\User::all()->where('role','admin');

        // This works because all admins'id are consequtive.

        return [
            'user_id' => $this->faker->numberBetween($admins->first()->id, $admins->last()->id),
            'name' => $this->faker->word(),
        ];
    }
}
