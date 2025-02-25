<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // clean the table, we can do it because cascade deleting (see chirps_table migration)
        DB::table('users')->delete();

        // create a fake user using User model class
        $user = new User();
        $user->name = 'Jane Doe';
        $user->email = 'jane@does.com';
        $user->password = Hash::make(value:  'dss123');
        $user->created_at = Carbon::now();
        $user->updated_at = $user->created_at;
        $user->save();


        // create other fake users, using Query Builder
        $users = array();
        $total = 2;

        for ($i = 1; $i <= $total; $i++) {

            $date = Carbon::now();
            $email = fake()->unique()->safeEmail();

            $user = [
                'name' => fake()->name(),
                'email' => $email,
                'password' => Hash::make(value:  $email),
                'created_at' => $date,
                'updated_at' => $date 
            ];

            $users[] = $user;
        }

        // insert into data base
        DB::table('users')->insert($users);

    }
}
