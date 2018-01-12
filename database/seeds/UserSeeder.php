<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = \App\Models\User\Role::getBySlug("admin");

        \App\User::create([
            'email'=>'admin@admin.hu',
            'name'=>'Adminisztrátor',
            'password' => bcrypt('asd')
        ])->addRole($adminRole);

    }
}
