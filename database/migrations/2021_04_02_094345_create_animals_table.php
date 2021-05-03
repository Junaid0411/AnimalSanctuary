<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            //DOB
            $table->date('dob');
            //DESCRIPTION
            $table->string('description');
            //TYPE
            $table->enum('group', ['dog', 'cat', 'bird', 'fish', 'other'])->default('other');
            //Picture
            $table->string('image', 256)->nullable();
            //Picture2
            $table->string('image2', 256)->nullable();
            //Availability
            $table->enum('availability', ['available', 'unavailable'])->default('available');
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
        Schema::dropIfExists('animals');
    }
}
