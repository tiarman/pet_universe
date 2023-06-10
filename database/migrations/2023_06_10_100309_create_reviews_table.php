<?php

use App\Models\Animal;
use App\Models\Review;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(with(new Review)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('animals_id');
            $table->string('name');
            $table->string('email');
            $table->text('review');
            $table->integer('rating');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('animals_id')->references('id')->on('animals');
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
        Schema::dropIfExists(with(new Review)->getTable());
    }
};
