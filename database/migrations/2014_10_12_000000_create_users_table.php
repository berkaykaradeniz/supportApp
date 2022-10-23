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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignID('group_id')->default(3)->constrained('groups');
            $table->integer('department_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('Şifre');
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'password' => bcrypt('123456'),
                'email' => 'admin@admin',
                'group_id' => 1
            )
        );
        
        DB::table('users')->insert(
            array(
                'name' => 'yazılımcı',
                'password' => bcrypt('123456'),
                'email' => 'yazilim@admin',
                'group_id' => 2,
                'department_id' => 1
            )
        );
        DB::table('users')->insert(
            array(
                'name' => 'yazılımcı2',
                'password' => bcrypt('123456'),
                'email' => 'yazilim2@admin',
                'group_id' => 2,
                'department_id' => 1
            )
        );
        DB::table('users')->insert(
            array(
                'name' => 'yazılımcı3',
                'password' => bcrypt('123456'),
                'email' => 'yazilim3@admin',
                'group_id' => 2,
                'department_id' => 1
            )
        );
        
        DB::table('users')->insert(
            array(
                'name' => 'Ağ',
                'password' => bcrypt('123456'),
                'email' => 'ag@admin',
                'group_id' => 2,
                'department_id' => 2
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
        Schema::dropIfExists('users');
    }
};
