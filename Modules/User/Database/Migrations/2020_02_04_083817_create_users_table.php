<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('OID')->nullable(false);        
            $table->string('FirstName', 100)->nullable();
            $table->string('LastName', 100)->nullable();          
            $table->string('EmailAddress', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->string('password', 100)->nullable();       
            $table->string('IsApproved', 1)->default('0');
            $table->string('IsLockedOut', 1)->nullable()->default('0');
            $table->dateTime('LastActivityDate')->nullable();
            $table->dateTime('LastloginDate')->nullable();
            $table->integer('Clinician')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();

            /*
            $table->dateTime('LastPasswordChangeDate')->nullable();
            $table->string('Nickname', 100)->nullable();
            $table->dateTime('LastLockoutDate')->nullable();
            $table->string('PasswordAnswer', 100)->nullable();
            $table->string('IsCustomer', 1)->nullable();
            $table->string('IsRegistered', 1)->nullable();
            $table->string('IsSubscriber', 1)->nullable();
            $table->string('PasswordQuestion', 100)->nullable();
            $table->string('Comment', 100)->nullable();
            $table->string('MiddleInit', 100)->nullable();
            $table->string('Suffix', 100)->nullable();
            $table->string('CompanyName', 100)->nullable();
            $table->string('Phone', 100)->nullable();
            $table->string('Fax', 100)->nullable();
            $table->string('MobilePhone', 100)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            */
        });


         //insert dummy data into users table

        //administrator
        DB::table('users')->insert([
            'FirstName' => 'System',
            'LastName' => 'Administrator',
            'password' => Hash::make('12345'),
            'EmailAddress' => 'lbyarugaba@idi.co.ug',
            'userName' => 'admin',
            'IsApproved'=>'1',
            'IsLockedOut'=>'0',
            ]);
     
        //non-administrator
        DB::table('users')->insert([
            'FirstName' => 'Lambert',
            'LastName' => 'Byarugaba',
            'password' => Hash::make('12345'),
            'EmailAddress' => 'lbyarugaba@gmail.com',
            'userName' => 'lbyarugaba',
            'IsApproved'=>'0',
            'IsLockedOut'=>'0',
            ]);

        



        
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
}
