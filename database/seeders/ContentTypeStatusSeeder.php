<?php

namespace Database\Seeders;

use App\Models\ContentStatus;
use App\Models\ContentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTypeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anime = ContentType::query()->create(['name' => 'anime', 'action' => 'watch']);
        $films = ContentType::query()->create(['name' => 'films', 'action' => 'watch']);
        $serials = ContentType::query()->create(['name' => 'serials', 'action' => 'watch']);
        $manga = ContentType::query()->create(['name' => 'manga', 'action' => 'read']);
        $books = ContentType::query()->create(['name' => 'books', 'action' => 'read']);

        $planned = ContentStatus::query()->create(['name' => 'planned']);
        $viewed = ContentStatus::query()->create(['name' => 'viewed']);
        $finished = ContentStatus::query()->create(['name' => 'finished']);
        $postponed = ContentStatus::query()->create(['name' => 'postponed']);
        $rereading = ContentStatus::query()->create(['name' => 'rereading']);
        $reviewing = ContentStatus::query()->create(['name' => 'reviewing']);
        $viewing = ContentStatus::query()->create(['name' => 'viewing']);
        $reading = ContentStatus::query()->create(['name' => 'reading']);

        $viewIds = [$planned->id, $viewed->id, $postponed->id, $reviewing->id, $viewing->id];
        $readIds = [$planned->id, $finished->id, $postponed->id, $rereading->id, $reading->id];
        $anime->contentStatuses()->attach($viewIds);
        $films->contentStatuses()->attach($viewIds);
        $serials->contentStatuses()->attach($viewIds);
        $manga->contentStatuses()->attach($readIds);
        $books->contentStatuses()->attach($readIds);

    }
}
