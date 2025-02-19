<?php

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
        Schema::create('bookcategory', function (Blueprint $table) {
            $table->id();
//            $table->foreing('book_id')->constrained('books');
//            $table->foreing('category_id')->constrained('categories');
            $table->integer('book_id');
            $table->integer('category_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookcategory');
    }
};
