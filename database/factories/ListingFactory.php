<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    protected $model = Listing::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'longitude' => '-0.084028',
            'latitude' => '51.51028',
            'thumbnail' => '/client/findhouse/images/property/fp1.jpg',
            'images' => '/client/findhouse/images/property/fp2.jpg',
            'address' => $this->faker->address(),
            'commune' => '31846',
            'district' => '956',
            'province' => '95',
            'price' => 0,
            'description' => $this->faker->text,
            'sale_or_rent' => 1,
            'bedroom' => $this->faker->randomNumber(),
            'bathroom' => $this->faker->randomNumber(),
            'area' => $this->faker->randomNumber(),
            'user_id' => 2,
            'website_id' => 5
        ];
    }
}