<?php

namespace Marketplaceful\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Marketplaceful\Models\Listing;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => config('marketplaceful.user_model')::factory(),
            'title' => $this->faker->catchPhrase,
            'description' => $this->faker->paragraph,
            'price' => null,
            'feature_image_path' => null,
            'status' => Arr::random(collect(Listing::STATUSES)->keys()->toArray()),
            'published_at' => null,
        ];
    }

    public function draft()
    {
        return $this->state([
            'status' => 'draft',
        ]);
    }

    public function pendingApproval()
    {
        return $this->state([
            'status' => 'pending_approval',
        ]);
    }

    public function published()
    {
        return $this->state([
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    public function closed()
    {
        return $this->state([
            'status' => 'closed',
        ]);
    }
}
