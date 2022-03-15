<?php

use Illuminate\Database\Seeder;
use App\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            'HTML',
            'CSS',
            'JS',
            'PHP',
            'LARAVEL',
            // 'SQL',
        ];

        foreach ($technologies as $tech) {
            $newTech = new Technology();
            $newTech->name = $tech;
            $newTech->save();
        }
    }
}
