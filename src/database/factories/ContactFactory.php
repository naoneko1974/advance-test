<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->safeEmail(),
            'postcode' => $this->faker->numberBetween(1,999) . '-' . $this->faker->numberBetween(1,9999),
            'address' => $this->faker->city(),
            'building_name' => $this->faker->word(),
            'opinion' => $this->faker->text()
        ];
    }
}
