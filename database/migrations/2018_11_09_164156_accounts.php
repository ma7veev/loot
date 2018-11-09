<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Accounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (!Schema ::hasTable('accounts'))
       {
          //
          Schema ::create('accounts', function(Blueprint $table)
          {
             $table -> increments('id');
             $table -> boolean('type');
             $table -> string('name');
            // $table -> string('alias');
             $table -> longText('comment')->nullable();
            // $table -> longText('amount');
             $table -> timestamps();
          });
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('accounts');
    }
}
