<?php
   use Illuminate\Support\Facades\Schema;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Database\Migrations\Migration;
   
   class Entries extends Migration
   {
      /**
       * Run the migrations.
       *
       * @return void
       */
      public
      function up()
      {
         //
         if ( !Schema ::hasTable('groups'))
         {
            //
            Schema ::create('groups', function(Blueprint $table)
            {
               $table -> increments('id');
               $table -> string('name');
               $table -> integer('accounts_id');
               $table -> integer('operations_id');
               $table -> integer('balance_before');
               $table -> integer('balance_after');
               $table -> integer('operations_amount');
               $table -> timestamps();
            });
         }
      }
      
      /**
       * Reverse the migrations.
       *
       * @return void
       */
      public
      function down()
      {
         Schema ::dropIfExists('entries');
      }
   }
