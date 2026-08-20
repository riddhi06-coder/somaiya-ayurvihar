<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inpatient_services', function (Blueprint $table) {
            if (!Schema::hasColumn('inpatient_services', 'room_tariff_image')) {
                $table->string('room_tariff_image')->nullable()->after('room_tariff_title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('inpatient_services', function (Blueprint $table) {
            $table->dropColumn('room_tariff_image');
        });
    }
};
