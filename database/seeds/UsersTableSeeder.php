<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    const NUM_OF_USERS = 30;
    const NUM_OF_POSTS = 3;

    /**
     * Run the database seeds.
     */
    public function run(Faker\Generator $faker)
    {
        factory(App\User::class, self::NUM_OF_USERS)->create([
            'display_order' => function (array $attrs) use ($faker) {
                return $faker->unique()->numberBetween(1, self::NUM_OF_USERS);
            },
        ])->each(function (App\User $user, $index) {
            $faker = Faker\Factory::create();
            $user->posts()->saveMany(
                factory(App\Post::class, self::NUM_OF_POSTS)->make([
                    'user_id' => $user->id,
                    'display_order' => function (array $attrs) use ($faker) {
                        return $faker->unique()->numberBetween(1, self::NUM_OF_POSTS);
                    },
                ])
            );
        });
    }
}
