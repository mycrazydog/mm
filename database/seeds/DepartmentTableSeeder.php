<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
       public function run()
       {
         //delete users table records
         DB::table('departments')->delete();
         //insert some dummy records
         DB::table('departments')->insert(array(
             array('name'=>'Arts & Architecture'),
             array('name'=>'Geography & Earth Science'),
             array('name'=>'College of Liberal Arts and Sciences'),
             array('name'=>'Political Science'),
             array('name'=>'Health & Human Services'),
             array('name'=>'MSEAP'),
          ));
       } 
}