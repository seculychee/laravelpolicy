<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // -------------------------------
        // Core admin
        \App\Models\User\Role::findOrCreate("admin");
        // -------------------------------
        // User roles
        // Create users
        \App\Models\User\Role::findOrCreate("user.create");
        // Delete users
        \App\Models\User\Role::findOrCreate("user.delete");
        // Set roles
        \App\Models\User\Role::findOrCreate("user.roles");
        // Can see all related information of users
        \App\Models\User\Role::findOrCreate("user.view");
        // -------------------------------
        // Post roles
        // Can create new post
        \App\Models\User\Role::findOrCreate("post.create");
        // Can modify a post
        \App\Models\User\Role::findOrCreate("post.modify");
        // Can view all related information of a post
        \App\Models\User\Role::findOrCreate("post.view");

    }
}
