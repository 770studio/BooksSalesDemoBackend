<?php

namespace Database\Factories;

use App\Book;
use App\Rent;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        $created = $this->faker->dateTimeBetween('-3 months', 'now');
        return [
            'count' => rand(1,3) ,
            'deadline' => $this->faker->dateTimeThisMonth,
            'created_at' => $created,
            'updated_at' => $created,
            'deposit' => $this->faker->randomFloat(2, 100, 99999999 ),
            'user_id' => User::factory(),
            'book_id' => Book::factory(),

        ];
    }
}
