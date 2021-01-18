<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarketplacefulColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('owner')->default(false);
            $table->string('status', 50)->default('active');
            $table->text('profile_photo_path')->nullable();
            $table->timestamp('last_seen_at')->nullable();
        });
    }
}
