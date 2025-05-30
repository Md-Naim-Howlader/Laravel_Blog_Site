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
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("subcategory_id");
            $table->unsignedBigInteger("user_id");
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->string("image")->nullable();
            $table->string("author")->nullable();
            $table->text("description")->nullable();
            $table->string("post_date")->nullable();
            $table->string("tags")->nullable();
            $table->integer("status")->default(0)->nullable();
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->foreign("subcategory_id")->references("id")->on("subcategories")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

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
