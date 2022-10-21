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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('is_active')->default(1);

            $table->timestamps();
        });

        DB::table('departments')->insert(
            array(
                'name' => 'Yazılım',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
        DB::table('departments')->insert(
            array(
                'name' => 'Ağ',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
        DB::table('departments')->insert(
            array(
                'name' => 'Destek',
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
        Schema::dropIfExists('departments');
    }
};
