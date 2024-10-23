<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (Schema::hasColumn('cities', 'is_featured')) {
            return;
        }

        Schema::table('cities', function (Blueprint $table) {
            $table->tinyInteger('is_featured')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
};
