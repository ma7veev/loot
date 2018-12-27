<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountsBalance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if ( !Schema ::hasTable('accounts_balance'))
       {
          //
          Schema ::create('accounts_balance', function(Blueprint $table)
          {
             $table -> increments('id');
             $table -> integer('accounts_id')->unique();
             $table -> integer('operations_id');
             $table -> integer('value');
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
       Schema::dropIfExists('accounts_balance');
    }
}
