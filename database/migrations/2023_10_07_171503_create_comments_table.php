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


        Schema::create('comments', function (Blueprint $table) {


            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('body');
            $table->timestamps();


            //  $table->id();
            //  $table->foreignId('post_id')->nullable()->constrained()->cascadeOnDelete();
            //  $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            //  $table->text('content');
            //  $table->timestamps();

            //  $table->bigInteger('post_id')->unsigned()->index(); // this is working
            // // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            //  //$table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
