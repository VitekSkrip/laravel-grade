<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use QSchool\FakerImageProvider\FakerImageProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class SalonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return $this->faker->randomElement($this->salons());
    }

    private function salons(): array
    {
        return [
            [
                'name' => 'Ирбис',
                'image' => 'assets/pictures/test_salon_1.jpg',
                'address' => '945717, Саратовская область, город Орехово-Зуево, пл. Будапештсткая, 01',
                'phone' => '+7 (931) 490-56-09',
                'work_hours' => '11:00 - 19:00',
            ],
            [
                'name' => 'Московский Автомобильный Дом',
                'image' => 'assets/pictures/test_salon_2.jpg',
                'address' => '579986, Оренбургская область, город Талдом, пр. 1905 года, 54',
                'phone' => '+7 (920) 364-68-23',
                'work_hours' => '10:00 - 19:00',
            ],
            [
                'name' => 'АвтоГЕРМЕС',
                'image' => 'assets/pictures/test_salon_3.jpg',
                'address' => '654293, Тюменская область, город Одинцово, пр. Косиора, 60',
                'phone' => '+7 (924) 535-82-72',
                'work_hours' => '9:00 - 18:00',
            ],
            [
                'name' => 'АвтоЛидер',
                'image' => 'assets/pictures/test_salon_4.jpg',
                'address' => '013135, Брянская область, город Зарайск, пер. Ленина, 55',
                'phone' => '+7 (925) 608-39-04',
                'work_hours' => '11:00 - 20:00',
            ],
            [
                'name' => 'Автосалон Голд Стар Моторс',
                'image' => 'assets/pictures/test_salon_5.jpg',
                'address' => '635600, Смоленская область, город Орехово-Зуево, пер. Бухарестская, 02',
                'phone' => '+7 (968) 331-37-86',
                'work_hours' => '8:00 - 20:00',
            ],
            [
                'name' => 'Автосалон Центральный',
                'image' => 'assets/pictures/test_salon_6.jpg',
                'address' => '320924, Московская область, город Озёры, проезд Бухарестская, 14',
                'phone' => '+7 (967) 445-33-73',
                'work_hours' => '9:00 - 19:00',
            ],
            [
                'name' => 'Автосалон reMotors',
                'image' => 'assets/pictures/test_salon_7.jpg',
                'address' => '010669, Оренбургская область, город Солнечногорск, пл. Космонавтов, 96',
                'phone' => '+7 (977) 846-49-79',
                'work_hours' => '9:00 - 18:00',
            ],
            [
                'name' => 'Major Auto',
                'image' => 'assets/pictures/test_salon_8.jpg',
                'address' => '725641, Рязанская область, город Наро-Фоминск, пл. Славы, 60',
                'phone' => '+7 (922) 932-75-06',
                'work_hours' => '10:00 - 18:00',
            ],
            [
                'name' => 'АвтоСпецЦентр',
                'image' => 'assets/pictures/test_salon_9.jpg',
                'address' => '564778, Иркутская область, город Воскресенск, ул. Ломоносова, 70',
                'phone' => '+7 (952) 908-08-62',
                'work_hours' => '9:00 - 18:00',
            ],
            [
                'name' => 'Пилот',
                'image' => 'assets/pictures/test_salon_10.jpg',
                'address' => '129451, Липецкая область, город Дорохово, проезд Будапештсткая, 69',
                'phone' => '+7 (934) 543-12-21',
                'work_hours' => '11:00 - 21:00',
            ],
        ];
    }

    private function workHours(): array
    {
        return [
            '11:00 - 19:00',
            '9:00 - 18:00',
            '10:00 - 20:00',
            '8:00 - 18:00'
        ];
    }

    private function images(): array
    {
        return [
            "assets/pictures/test_salon_1.jpg",
            "assets/pictures/test_salon_2.jpg",
            "assets/pictures/test_salon_3.jpg",
            "assets/pictures/test_salon_4.jpg",
            "assets/pictures/test_salon_5.jpg",
            "assets/pictures/test_salon_6.jpg",
            "assets/pictures/test_salon_7.jpg",
            "assets/pictures/test_salon_8.jpg",
            "assets/pictures/test_salon_9.jpg",
            "assets/pictures/test_salon_10.jpg",
        ];
    }
}
