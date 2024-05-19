<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Job;

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
