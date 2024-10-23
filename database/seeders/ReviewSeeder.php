<?php

namespace Database\Seeders;

use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\Project;
use Botble\RealEstate\Models\Property;
use Botble\RealEstate\Models\Review;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::query()->truncate();

        $accountsCount = Account::query()->count();
        $projectsCount = Project::query()->count();
        $propertiesCount = Property::query()->count();

        $faker = fake();

        $now = Carbon::now();

        foreach (range(1, 200) as $ignored) {
            $reviewable = $faker->randomElement([
                ['id' => rand(1, $projectsCount), 'type' => Project::class],
                ['id' => rand(1, $propertiesCount), 'type' => Property::class],
            ]);

            Review::query()->insertOrIgnore([
                'account_id' => rand(1, $accountsCount),
                'reviewable_type' => $reviewable['type'],
                'reviewable_id' => $reviewable['id'],
                'content' => $faker->realText(rand(30, 300)),
                'star' => rand(1, 5),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
