<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([
            'name' => 'Mudilaste võimlemine (2 - 3 aastat, koos vanematega)',
            'description' => '',
            'is_full' => true
        ]);

        DB::table('fields')->insert([
            'name' => 'Mudilaste võimlemine (3 - 4 aastat)',
            'description' => '',
        ]);

        DB::table('fields')->insert([
            'name' => 'Mudilaste võimlemine (4 - 5 aastat)',
            'description' => '',
        ]);

        DB::table('fields')->insert([
            'name' => 'Akrobaatiline võimlemine Team Gym',
            'description' => '<p>Vanus: 5 - 12 aastat</p>',
        ]);

        DB::table('fields')->insert([
            'name' => 'Trampoliini võimlemine',
            'description' => '<p>Vanus: 7 - 10 aastat</p>',
        ]);

        DB::table('fields')->insert([
            'name' => 'Trefoil Show Team',
            'description' => '<p>Vanus: 11 - 25 aastat</p>',
        ]);
    }
}
