<?php
   use Illuminate\Support\Facades\Schema;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Database\Migrations\Migration;
   
   class Groups extends Migration
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
               $table -> longText('comment') -> nullable();
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
         //
         Schema ::dropIfExists('groups');
      }
   }
