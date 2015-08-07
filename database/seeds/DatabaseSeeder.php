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
        //this message shown in your terminal after running db:seed command
        $this->command->info("Departments table seeded");
        
        $this->call('SourceTableSeeder');
        $this->command->info("Sources table seeded");
        
        $this->call('ProjectTableSeeder');
        $this->command->info("Projects table seeded");        

        Model::reguard();
    }
}
