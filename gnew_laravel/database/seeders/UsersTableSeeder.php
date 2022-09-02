<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            ['name' => 'Gonzalo Apaza', 'email' => 'gapazaq@gmail.com', 'password' => bcrypt('demo')],
        ];
        foreach ($rows as $row) {
            User::create($row);
        }
    }
}
