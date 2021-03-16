<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * книга, арендатор, количество, срок
    аренды, сумма залога.
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->date('deadline');
            $table->unsignedFloat('deposit', 10, 2);
            $table->foreignId('book_id'); // rent belongsto book
            $table->foreignId('user_id'); // rent belongsto user

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
