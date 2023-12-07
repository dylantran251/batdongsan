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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('ward_id');
            $table->boolean('type')->default(1);
            $table->tinyInteger('vip')->default(0);
            $table->string('title', 100)->index();
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->decimal('price', 14);
            $table->decimal('sub_price', 12);
            $table->decimal('area',  8);
            $table->tinyInteger('status');
            $table->json('images')->nullable();
            $table->tinyInteger('floors');
            $table->tinyInteger('bedroom');
            $table->tinyInteger('toilet');
            $table->string('house_direction', 20)->nullable();
            $table->string('balcony_direction', 20)->nullable();
            $table->string('legal_documents', 100);
            $table->json('other_properties')->nullable();
            $table->unsignedBigInteger('real_estate_type');
            $table->time('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
