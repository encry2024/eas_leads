<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnsInCallDispositionsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('call_dispositions', function (Blueprint $table) {
         $table->string('type')->nullable()->change();
         $table->string('description')->nullable()->change();
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {

   }
}
