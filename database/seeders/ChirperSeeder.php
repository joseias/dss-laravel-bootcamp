<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChirperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // clean the table
        DB::table('chirps')->delete();

        // get all users
        $users = DB::table('users')->get();

        // creating fake chirps for each user
        foreach ($users as $user) {

            $chirps = array();

            $total = random_int(min: 1, max: 3);

            for ($i = 0; $i < $total; $i++) {
                $chirp = [
                    'user_id' => $user->id,
                    'message' => fake()->realTextBetween(minNbChars: 5, maxNbChars: 10),
                    'created_at' => fake()->date(),
                    'updated_at' => fake()->date(),
                ];

                $chirps[] = $chirp;

            }

            DB::table('chirps')->insert(values: $chirps);
        }





    }
}
