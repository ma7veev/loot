<?php
   use Illuminate\Support\Facades\Schema;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Database\Migrations\Migration;
   
   class Items extends Migration
   {
      /**
       * Run the migrations.
       *
       * @return void
       */
      public
      function up()
      {
         if ( !Schema ::hasTable('items'))
         {
            //
            Schema ::create('items', function(Blueprint $table)
            {
               $table -> increments('id');
               $table -> string('name');
               $table -> integer('groups_id');
               $table -> boolean('type');
               $table -> longText('comment')->nullable();
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
         Schema::dropIfExists('items');
      }
   }
