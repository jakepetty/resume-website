<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new \App\User();
        $user->name = config('app.name');
        $user->email = config('mail.from.address');
        $user->password = Hash::make("password");
        $user->save();
    }
}
