<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('user_type',[0,1])->comment('0=>admin,1=>user');
            $table->foreignId('user_id')->index()->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('title');
            $table->string('video');
            $table->date('published_at');
            $table->string('link');
            $table->text('description');
            $table->string('hashtags');
            $table->string('thambuli')->nullable();
            $table->string('slug');         
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
        Schema::dropIfExists('videoes');
    }
}
