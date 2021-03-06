<?php

declare(strict_types=1);

namespace Database\Factories\English;

use English\User;
use English\Status;
use English\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Comment::class;

	/**
	 * Define the model's default state.
	 */
	public function definition(): array
	{
		return [
			'status_id' => fn () => Status::factory()->create()->id,
			'user_id'   => fn () => User::factory()->create()->id,
			'body'      => $this->faker->paragraph,
		];
	}
}
