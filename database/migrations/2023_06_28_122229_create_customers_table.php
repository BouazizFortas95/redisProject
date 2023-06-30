<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('national_num')->unique()->index();
            $table->string('name', 100);
            $table->string('email', 100)->unique()->index();
            $table->enum('choices', ['plane_1', 'plane_2', 'plane_3'])->nullable()->default('plane_1');
            $table->date('subscribtion_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
