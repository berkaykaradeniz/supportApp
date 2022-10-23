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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignID('department_id')->constrained('departments');
            $table->foreignID('user_id')->constrained('users');
            $table->string('title');
            $table->string('description');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        DB::table('tickets')->insert(
            array(
                'department_id' => 1,
                'user_id' => 1,
                'title' => 'My Problem is',
                'description' => 'This',
                'status' => 1,
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
        Schema::dropIfExists('tickets');
    }
};
