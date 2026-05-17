<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('tbl_general_setting')->insertOrIgnore([
            ['key' => 'acn_number', 'value' => ''],
            ['key' => 'bsb', 'value' => ''],
            ['key' => 'account_number', 'value' => ''],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('tbl_general_setting')->whereIn('key', ['acn_number', 'bsb', 'account_number'])->delete();
    }
};
