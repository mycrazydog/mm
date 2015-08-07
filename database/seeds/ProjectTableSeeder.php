<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
       public function run()
       {
         //delete users table records
         DB::table('projects')->delete();
         //insert some dummy records
         DB::table('projects')->insert(array(
             array('name'=>'Regional Indicators'),
             array('name'=>'Expert Opinion'),
             array('name'=>'Iredell-Statesville Redistricting'),
             array('name'=>'Purdue Visit'),
             array('name'=>'General'),
             array('name'=>'Annual Survey'),
             array('name'=>'Business First'),
             array('name'=>'Citistates'),
             array('name'=>'ArticlesOfInterest'),
             array('name'=>'CMS Superintendent Search'),
             array('name'=>'Crossroads'),
             array('name'=>'Gaston County Schools'),
             array('name'=>'Indicator Databank'),
             array('name'=>'Library ROI/Task Force'),
             array('name'=>'PlanCharlotte.org'),
             array('name'=>'RENCI'),
             array('name'=>'UI Website'),
             array('name'=>'United Way'),
             array('name'=>'Urban League'),
             array('name'=>'Website'),
             array('name'=>'Conference Attendance'),
             array('name'=>'Training'),
             array('name'=>'NCDOT Bikes/Bed'),
             array('name'=>'Keeping Watch on Water - Creeks'),
          ));
       }
       
}