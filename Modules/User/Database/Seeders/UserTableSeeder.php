<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //insert dummy data into users table

        //administrator
        DB::table('users')->insert([
            'FirstName' => 'System',
            'LastName' => 'Administrator',
            'password' => Hash::make('12345'),
            'EmailAddress' => 'lbyarugaba@idi.co.ug',
            'userName' => 'admin',
            'IsApproved'=>'1',
            ]);
     
        //non-administrator
        DB::table('users')->insert([
            'FirstName' => 'Lambert',
            'LastName' => 'Byarugaba',
            'password' => Hash::make('12345'),
            'EmailAddress' => 'lbyarugaba@gmail.com',
            'userName' => 'lbyarugaba',
            'IsApproved'=>'0',
            ]);

    }
}
