<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name' => 'Yura Adam',
                'email' => 'yura@mail.com',
                'role' => 'EMPLOYEE',
                'password' => bcrypt('hahahehe')
            ],
            [
                'name' => 'Aston Martin',
                'email' => 'aston@mail.com',
                'role' => 'EMPLOYEE',
                'password' => bcrypt('hahahehe')
            ]
        ];
        foreach($data as $d){
            User::create($d);
        }
    }
}
