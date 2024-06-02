<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory(116)->create();

        try {
            Job::all()->each(fn ($job) => $job->tags()->attach(Tag::all()->random(mt_rand(1, 7))));
        } catch (\Throwable $th) {
        }
    }
}
