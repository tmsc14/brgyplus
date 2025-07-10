<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppearanceSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('appearance_settings', function (Blueprint $table) {
            $table->id();
            $table->string('theme_color')->default('#FAEED8');
            $table->string('primary_color')->default('#503C2F');
            $table->string('secondary_color')->default('#FAFAFA');
            $table->string('text_color')->default('#000000');
            $table->string('logo_path')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('appearance_settings');
    }
}
