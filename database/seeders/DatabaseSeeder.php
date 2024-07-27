<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gene;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Gene::factory()->count(5)->create();

        // Lấy tất cả các gene đã được tạo
        $genes = Gene::all();

        // Tạo 50 bộ phim với các thể loại ngẫu nhiên
        Movie::factory()->count(50)->make()->each(function($movie) use ($genes) {
            $movie->genre_id = $genes->random()->id;
            $movie->save();
        });
    }
}
