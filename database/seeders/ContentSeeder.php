<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anime = Content::query()->create(
            [
                'name' => "It's an anime name",
                'type_id' => 1,
                'current_status' => 'ongoing',
                'release_date' => '2023-10-05'
            ]);
        $manga = Content::query()->create([
            'name' => "It's a manga name",
            'type_id' => 4,
            'current_status' => 'announced'
        ]);
        $anime->users()->attach([1,2]);
        $manga->users()->attach([2]);
    }
}
