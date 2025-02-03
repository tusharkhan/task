<?php

namespace Database\Factories;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchant_id' => function () {
                return Merchant::all()->random();
            },
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'password' => Hash::make('password'),
        ];
    }
}
