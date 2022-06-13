<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Platform as BookPlatform;
use App\Models\Series;
use App\Models\User;
use App\Models\Book\{
    BookGenre,
};
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
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->uuid();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Author::class);
            $table->foreignIdFor(Series::class);
            $table->foreignIdFor(BookPlatform::class);
            $table->string('title');
            $table->string('goodreads_url')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->longText('review')->nullable();
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
