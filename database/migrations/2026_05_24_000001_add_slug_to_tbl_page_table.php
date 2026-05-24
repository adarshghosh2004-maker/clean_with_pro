<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tbl_page', function (Blueprint $table) {
            $table->string('slug')->after('title')->nullable()->unique();
        });

        $pages = DB::table('tbl_page')->get();
        foreach ($pages as $page) {
            $slug = Str::slug($page->title);
            $count = DB::table('tbl_page')->where('slug', $slug)->where('id', '!=', $page->id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            DB::table('tbl_page')->where('id', $page->id)->update(['slug' => $slug]);
        }
    }

    public function down(): void
    {
        Schema::table('tbl_page', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
