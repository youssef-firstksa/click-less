<?php

namespace Database\Factories;

use App\Models\BankTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'font_color' => $this->faker->safeHexColor(),
            'background_color' => $this->faker->safeHexColor(),
            'logo' => $this->faker->imageUrl(200, 200, 'business', true, 'logo'),
            'img' => $this->faker->imageUrl(600, 400, 'finance', true, 'bank'),
            'ai_key' => $this->faker->uuid(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($bank) {
            BankTranslation::factory()->create([
                'bank_id' => $bank->id,
                'locale' => 'en',
            ]);

            BankTranslation::factory()->create([
                'bank_id' => $bank->id,
                'locale' => 'ar',
            ]);
        });
    }
}
