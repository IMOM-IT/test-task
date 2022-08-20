<?php

namespace Database\Factories;

use App\Models\AccountingCars;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

class AccountingCarsFactory extends Factory
{
    protected $model = AccountingCars::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_brand' => $this->faker->text,
            'car_model' => $this->faker->text,
            'number' => $this->faker->text,
            'color' => $this->faker->hexColor,
            'is_paid' => $this->faker->boolean,
            'comment' => $this->faker->text

        ];
    }
}
