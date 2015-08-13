<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        
        //call uses table seeder class
        $this->call('DepartmentTableSeeder');
		$this->call('SourceTableSeeder');
        $this->call('ProjectTableSeeder');
        
        $this->call(SentinelRoleSeeder::class);
        $this->call(SentinelUserSeeder::class);
        $this->call(SentinelUserRoleSeeder::class);
        
        $this->command->info("Projects table seeded");        

        Model::reguard();
    }
}
