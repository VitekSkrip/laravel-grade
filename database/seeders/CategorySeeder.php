<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Легковые',
                'children' => [
                    ['name' => 'Седаны'],
                    ['name' => 'Хетчбеки'],
                    ['name' => 'Универсалы'],
                    ['name' => 'Купе'],
                    ['name' => 'Родстеры'],
                ],
            ],
            [
                'name' => 'Внедорожники',
                'children' => [
                    ['name' => 'Рамные'],
                    ['name' => 'Пикапы'],
                    ['name' => 'Кроссоверы'],
                ],
            ],
            ['name' => 'Раритетные'],
            ['name' => 'Распродажа'],
            ['name' => 'Новинки'],
        ];
 
        foreach ($this->categoriesSlug($categories) as $category) {
            Category::create($category);
        }
    }

    private function categoriesSlug(array $categories): array
   {
       array_walk($categories, function (&$category) {
           if (isset($category['children'])) {
               $category['children'] = $this->categoriesSlug($category['children']);
           }
           $category['slug'] = Str::slug($category['name']);
       });

       return $categories;
   }

}
