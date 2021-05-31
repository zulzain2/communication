<?php

namespace Database\Factories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      do {
        $from = rand(1, 30);
        $to = rand(1, 30);
        $is_read = rand(0, 1);
      } while ($from === $to);

      return [
          'from' => $from,
          'to' => $to,
          'message' => $this->faker->sentence,
          'is_read' => $is_read
      ];
    }
}
