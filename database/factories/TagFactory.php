<?php

namespace Marketplaceful\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Marketplaceful\Models\Tag;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase,
        ];
    }
}
