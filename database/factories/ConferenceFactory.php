<?php

namespace Database\Factories;

use App\Enums\Region;
use App\Models\Conference;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConferenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conference::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $date = now()->addMonths(9);
        $endDate = now()->addMonths(9)->addDays(2);

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'start_date' => $date,
            'end_date' => $endDate,
            'status' => $this->faker->randomElement(['draft', 'published', 'archived',]),
            'region' => $this->faker->randomElement(Region::class),
            'venue_id' => null,
        ];
    }
}
