<?php

use Illuminate\Database\Seeder;
use App\Model\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('divisions')->delete();
        $data = [
            [
                'nama' => 'IT'
            ],
            [
                'nama' => 'Finance'
            ],
            [
                'nama' => 'Accounting'
            ]
        ];
        foreach($data as $d){
            Division::create($d);
        }
    }
}
