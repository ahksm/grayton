<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('tariff_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tariff_id');
            $table->string('locale');
            $table->string('name_translation');
            $table->text('descr_translation');
            $table->timestamps();

            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tariff_translations');
    }
}
