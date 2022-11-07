<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ImagesRepositoryContract $imagesRepository)
    {
        foreach ($this->imagesPath() as $imagePath) {
            $bannerImage = $imagesRepository->create('banners', resource_path($imagePath));

           $imageId = $bannerImage->id; 

            Banner::factory()->create(['image_id' => $imageId]);        
        }
    }

    private function imagesPath(): array
    {
        return [
                'assets/pictures/test_banner_1.jpg',
                'assets/pictures/test_banner_2.jpg',
                'assets/pictures/test_banner_3.jpg',
        ];
    }
}
