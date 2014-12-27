<?php

class UsersTableSeeder extends Seeder {

    public function run(){
        DB::table('users')->delete();

        User::create(array(
            'username' => 'user1',
            'password' => Hash::make('pass1')
        ));

        User::create(array(
            'username' => 'user2',
            'password' => Hash::make('pass2')
        ));
    }

}