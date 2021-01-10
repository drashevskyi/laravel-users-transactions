<?php

use Illuminate\Database\Seeder;
use App\Models\UserDetails;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        factory(UserDetails::class, $count)->create();
    }
}
