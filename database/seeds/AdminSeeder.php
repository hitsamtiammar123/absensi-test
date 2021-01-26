<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->role = 'ADMIN';
        $user->password = bcrypt('hahahehe');
        $user->save();
    }
}
