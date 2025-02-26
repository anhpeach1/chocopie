<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryHashtagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_hashtag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')->constrained('stories')->onDelete('cascade'); // Xóa liên kết khi Story bị xóa
            $table->foreignId('hashtag_id')->constrained('hashtags')->onDelete('cascade'); // Xóa liên kết khi Hashtag bị xóa
            $table->timestamps();

            $table->unique(['story_id', 'hashtag_id']); // Đảm bảo cặp Story-Hashtag là duy nhất
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('story_hashtag');
    }
}