<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncyclopediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encyclopedias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encyclopedia_category_id')->nullable()->constrained('encyclopedia_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('image')->nullable();
            $table->longText('text');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('encyclopedias');
    }
}
