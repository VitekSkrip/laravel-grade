<?php

namespace Database\Factories;

use App\Enums\ModelStatus;
use App\Models\CarEngine;
use App\Models\CarClass;
use App\Models\CarBody;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $price = rand(500000, 5000000),
            'old_price' => $this->faker->optional()->numberBetween((int) ($price * 1.1), (int) ($price * 1.2)),
            'image_id' => Image::factory(),
            'description' => $this->faker->paragraphs(rand(2, 5), true),
            'salon' => $this->faker->randomElement($this->salons()),
            'kpp' => $this->faker->randomElement($this->transmissions()),
            'year' => rand(2015, (int) date('Y')),
            'color' => $this->faker->randomElement($this->colors()),
            'is_new' => $this->faker->boolean(25),
            'status' => $this->faker->randomElement(ModelStatus::cases()),
            'engine_id' => CarEngine::factory(),
            'class_id' => CarClass::factory(),
            'body_id' => CarBody::factory(),
            'category_id' => Category::factory(),
        ];
    }

    /**
     * @return string[]
     */
    private function salons(): array
    {
        return [
            'Черный, Однотонная ткань (WK)',
            'Черный, Тканевая отделка (WK)',
            'Черный, Натуральная кожа (WK)',
            'Черный с серыми вставками, Тканевая отделка (WK)',
            'Черный с красной прострочкой (WK)',
            'Черный, Комбинированная кожаная отделка (WK)',
        ];
    }

    /**
     * @return string[]
     */
    private function colors(): array
    {
        return [
            'Clear White (1D)',
            'Silky Silver Metallic (4SS)',
            'Aurora Black Pearl (ABP)',
            'Deep Sea Blue Metallic (B2R)',
            'Fire Orange Metallic (DRG)',
            'Gravity Grey Pearl (KDG/KDT)',
            'Currant Red Metallic (R4R)',
            'Snow White Tricoat (SWP)',
            'Clear White (UD)',
            'Silver Blue (KLG)',
            'Sporty Blue Pearl (SPB)',
            'Bright Red (ADR)',
            'Aruba Stone Pearl (ASG)',
            'Crystal Beige Pearl (CRB)',
            'Sapphire Blue (DU2)',
            'Ebony Black (EB)',
            'Silver Green Metallic (ERG)',
            'White Tricoat (GWP)',
            'Sparkling Silver Metallic (KCS/KTZ)',
            'Black Cherry Pearl (9H)',
            'Black Cherry Pearl (9P)',
            'Fiery Red Tricoat (A3R)',
            'Mercury Blue Pearl (BU2)',
            'Patrina Gold Pearl (BY2)',
        ];
    }

    /**
     * @return string[]
     */
    private function transmissions(): array
    {
        return [
            'Механика, 6MT',
            'Автомат, 6AT',
            'Автомат, 7AT',
            'Автомат, 8AT',
            'Робот, 7DCT',
            'Вариатор, IVT',
        ];
    }
}
