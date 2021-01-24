<?php

use Illuminate\Database\Seeder;
use App\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new \App\User;
        $administrator->username = "Administrator";
        $administrator->name = "Ivan Site Administrator";
        $administrator->email = "ivan@admin.com";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make(12345);
        $administrator->avatar = "image.png";
        $administrator->address = "kapuk";
        $administrator->phone = '082122544418';

        $administrator->save();

        $this->command->info("Punya Ivan");


    }
}
