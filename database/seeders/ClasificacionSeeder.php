<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//importar


class ClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificacions')->insert([
            [ 
            'nombre' => 'personal', 
            ],
            [ 
                'nombre' => 'trabajo', 
            ],
            [ 
                'nombre' => 'escuela',    
            ],
            [ 
                'nombre' => 'hogar',    
            ]
    ]);
    }
}
