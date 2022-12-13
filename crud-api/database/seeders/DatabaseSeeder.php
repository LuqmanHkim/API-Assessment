<?php

namespace Database\Seeders;

use App\Models\Event;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('event')->insert([[
            'id' => (string) Str::uuid(),
            'name' => 'raziq',
            'startAt' => '2022-12-02',
            'endAt' => '2023-01-01',
        ],
        [
            'id' => (string) Str::uuid(),
            'name' => 'tasha',
            'startAt' => '2022-12-03',
            'endAt' => '2023-03-01',
        ],
        [
            'id' => (string) Str::uuid(),
            'name' => 'danish',
            'startAt' => '2022-12-12',
            'endAt' => '2023-03-02',
        ],
        [
            'id' => (string) Str::uuid(),
            'name' => 'yul',
            'startAt' => '2022-11-02',
            'endAt' => '2023-09-01',
        ],
        [
            'id' => (string) Str::uuid(),
            'name' => 'kimi',
            'startAt' => '2022-12-17',
            'endAt' => '2023-01-06',
        ]]);

    }
}
