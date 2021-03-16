<?php

use App\Book;
use App\Rent;
use App\User;
use Database\Seeders\BookSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        Rent::factory()->count(25)->create(); //  25 рент с юзером и книгой
        User::factory()->count(10)->create(); // 10 без рент
        Book::factory()->count(10)->create(); // 10 без рент








    }
}
