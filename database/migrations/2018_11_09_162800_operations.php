<?php
   use Illuminate\Support\Facades\Schema;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Database\Migrations\Migration;
   
   class Operations extends Migration
   {
      /**
       * Run the migrations.
       *
       * @return void
       */
      public
      function up()
      {
         if (!Schema ::hasTable('operations'))
         {
            //
            Schema ::create('operations', function(Blueprint $table)
            {
               $table -> increments('id');
            //   $table -> string('type');
               $table -> string('items_id');
               $table -> integer('accounts_id');
               $table -> longText('comment')->nullable();
               $table -> integer('amount')->default(0);
               $table -> integer('balance');
               $table -> boolean('deleted')->default(0);
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
         Schema::dropIfExists('operations');
      }
   }
