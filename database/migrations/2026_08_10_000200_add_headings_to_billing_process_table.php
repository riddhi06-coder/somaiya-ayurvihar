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
        Schema::table('billing_process', function (Blueprint $table) {
            if (!Schema::hasColumn('billing_process', 'sd_heading')) {
                $table->string('sd_heading')->nullable()->after('doc_submitted_desc');
            }
            if (!Schema::hasColumn('billing_process', 'declaration_heading')) {
                $table->string('declaration_heading')->nullable()->after('sd_heading');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('billing_process', function (Blueprint $table) {
            $table->dropColumn(['sd_heading', 'declaration_heading']);
        });
    }
};
