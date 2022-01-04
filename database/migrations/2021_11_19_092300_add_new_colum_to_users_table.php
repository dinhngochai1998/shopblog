<?php

/**
 * Migrate user
 * 
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('avatar');
            $table->text('education')->nullable();
            $table->text('skills')->nullable();
            $table->string('location')->nullable();
            $table->text('notes')->nullable();
            $table->date('birthday')->nullable();
            $table->string('roles')->nullable();
            $table->string('is_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
