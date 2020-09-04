<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdentifierToAdjustments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adjustments', function (Blueprint $table) {
            $table->string('identifier')->after('document_id')->nullable();
            $table->string('before')->after('identifier')->nullable();
            $table->string('after')->after('before')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adjustments', function (Blueprint $table) {
            $table->dropColumn('identifier');
            $table->dropColumn('before');
            $table->dropColumn('after');
        });
    }
}
