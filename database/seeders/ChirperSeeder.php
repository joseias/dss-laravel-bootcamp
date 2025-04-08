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

            $total = random_int(min: 0, max: 10);

            for ($i = 0; $i < $total; $i++) {
                $user_id = $user->id;
                $message = fake()->realTextBetween(minNbChars: 5, maxNbChars: 200);
                $created_at = fake()->dateTimeBetween('-1 week', '+1 week');
                $updated_at = $created_at;

                // randomly set updated_at
                if (random_int(min: 0, max: 1) == 1){
                    $updated_at = fake()->dateTimeBetween($created_at, '+1 week');
                }

                $chirp = [
                    'user_id' => $user_id,
                    'message' => $message,
                    'created_at' => $created_at,
                    'updated_at' => $updated_at
                ];

                $chirps[] = $chirp;

            }

            DB::table('chirps')->insert(values: $chirps);
        }





    }
}
