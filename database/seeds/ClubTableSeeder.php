<?php

use Illuminate\Database\Seeder;
use App\User;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $clubId = DB::table('clubs')->insertGetId([
            'name' => 'Trefoil',
        ]);

        $userId = User::where('email', 'sktrefoil@gmail.com')->first()->id;

        /*------------------------------------------ */
        $personId = DB::table('people')->insertGetId([
          'firstname' => 'Olga',
          'lastname' => 'Gogoladze',
          'personal_code' => '00000000000',
          'email' => 'sktrefoil@gmail.com',
          'user_id' => $userId,
        ]);

        DB::table('coaches')->insert([
          'person_id' => $personId,
          'club_id' => $clubId,
        ]);

        /*------------------------------------------ */
        $personId = DB::table('people')->insertGetId([
            'firstname' => 'Tatjana',
            'lastname' => 'Kabrits',
            'personal_code' => '00000000000',
            'email' => 'tatjana2369@mail.ru',
        ]);

        DB::table('coaches')->insert([
            'person_id' => $personId,
            'club_id' => $clubId,
        ]);

        /*------------------------------------------ */
        $personId = DB::table('people')->insertGetId([
            'firstname' => 'Julia',
            'lastname' => 'Ulanova',
            'personal_code' => '00000000000',
            'email' => 'singa.julia@gmail.com',
        ]);

        DB::table('coaches')->insert([
            'person_id' => $personId,
            'club_id' => $clubId,
        ]);

        /*------------------------------------------ */
        $personId = DB::table('people')->insertGetId([
            'firstname' => 'Oleg',
            'lastname' => 'Semjonov',
            'personal_code' => '00000000000',
            'email' => 'semjonovoleg74@gmail.com',
        ]);

        DB::table('coaches')->insert([
            'person_id' => $personId,
            'club_id' => $clubId,
        ]);

        /*------------------------------------------ */
        $personId = DB::table('people')->insertGetId([
            'firstname' => 'Jelena',
            'lastname' => 'Popusina',
            'personal_code' => '00000000000',
            'email' => '_fiamma_@list.ru',
        ]);

        DB::table('coaches')->insert([
            'person_id' => $personId,
            'club_id' => $clubId,
        ]);

        /*------------------------------------------ */
        $personId = DB::table('people')->insertGetId([
            'firstname' => 'Andrei',
            'lastname' => 'Medvedski',
            'personal_code' => '00000000000',
            'email' => '',
        ]);

        DB::table('coaches')->insert([
            'person_id' => $personId,
            'club_id' => $clubId,
        ]);

        /*------------------------------------------ */
        $personId = DB::table('people')->insertGetId([
            'firstname' => 'Maria',
            'lastname' => 'Ivantsenko',
            'personal_code' => '00000000000',
            'email' => '',
        ]);

        DB::table('coaches')->insert([
            'person_id' => $personId,
            'club_id' => $clubId,
        ]);

        /*------------------------------------------ */
        $personId = DB::table('people')->insertGetId([
            'firstname' => 'Maksim',
            'lastname' => 'Grankin',
            'personal_code' => '00000000000',
            'email' => '',
        ]);

        DB::table('coaches')->insert([
            'person_id' => $personId,
            'club_id' => $clubId,
        ]);

        /*------------------------------------------ */
        DB::table('groups')->insert([
            'name' => 'Kids 1',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Kids 2',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Kids 3',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Mini B1',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Mini B2',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Mini B3',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Mini A',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Noored',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Juuniorid',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Algajad',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Trampoliini võimlemine',
            'club_id' => $clubId,
        ]);

        DB::table('groups')->insert([
            'name' => 'Trefoil Show Team',
            'club_id' => $clubId,
        ]);
    }
}
