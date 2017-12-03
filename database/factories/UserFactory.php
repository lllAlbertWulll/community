<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
  return [
	'name' => $faker->name,
	'email' => $faker->email,
	'avatar' => $faker->imageUrl(256, 256),
	'confirm_code' =>str_random(48),
	'password' => bcrypt(str_random(10)),
	'remember_token' => str_random(10),
  ];
});
$factory->define(App\Discussion::class, function (Faker $faker) {
  $user_ids = \App\User::pluck('id')->toArray();
  return [
	'title' => $faker->sentence,
	'body' => $faker->paragraph,
	'user_id' => $faker->randomElement($user_ids),
	'last_user_id' => $faker->randomElement($user_ids),
  ];
});
$factory->define(App\Comment::class, function (Faker $faker) {
  $user_ids = \App\User::pluck('id')->toArray();
  $discussion_ids = \App\Discussion::pluck('id')->toArray();
  return [
	'body' => $faker->paragraph,
	'user_id' => $faker->randomElement($user_ids),
	'discussion_id' => $faker->randomElement($discussion_ids),
  ];
});