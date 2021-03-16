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



        return [
            'count' => rand(1,3) ,
            'deadline' => $this->faker->dateTimeThisMonth,
            'deposit' => $this->faker->randomFloat(2, 100, 99999999 ),
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
        ];
    }
}
