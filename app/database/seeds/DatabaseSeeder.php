<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
    }
}



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            'role' => 'admin',
            'slug' => 'admin',
            'name' => 'Администратор',
        ]);

        DB::table('roles')->insert([
            'role' => 'user',
            'slug' => 'user',
            'name' => 'Зарегестрированный пользователь',
        ]);
    }
}