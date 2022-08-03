<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkautingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skautings', function (Blueprint $table) {
            $table->id();
            $table->string('skauting_maydon')->nullable();
            $table->text('skauting_foydalanuvchi')->NULL();
            $table->text('skauting_lavozim');
            $table->string('skauting_foto');
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
        Schema::dropIfExists('skautings');
    }
}
