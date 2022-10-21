<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('groups')->insert(
            array(
                'name' => 'Yetkili',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
        DB::table('groups')->insert(
            array(
                'name' => 'Personel',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
        DB::table('groups')->insert(
            array(
                'name' => 'Müşteri',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
