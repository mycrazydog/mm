<?php

use Illuminate\Database\Seeder;

class SourceTableSeeder extends Seeder
{
       public function run()
       {
         //delete users table records
         DB::table('sources')->delete();
         //insert some dummy records
         DB::table('sources')->insert(array(
             array('name'=>'Anna Caukins (http://anncaulkins.com)'),
             array('name'=>'Arts and Science Council'),
             array('name'=>'www.BlueBanner.net'),
             array('name'=>'Business Today'),
             array('name'=>'Charlotte Biz'),
             array('name'=>'Charlotte Magazine'),
             array('name'=>'Charlotte Observer'),
             array('name'=>'Charlotte Post'),
             array('name'=>'Charlotte Viewpoint'),
             array('name'=>'Catawba Riverkeeper'),
             array('name'=>'Creative Loafing'),
             array('name'=>'Durham Herald-Sun'),
             array('name'=>'Gaston Gazette'),
             array('name'=>'Independent Tribune'),
             array('name'=>'Mecklenburg Citizens for Public Education'),
             array('name'=>'NC Policy Watch'),
             array('name'=>'North Carolina Construction News'),
             array('name'=>'www.PlanningPool.org'),
             array('name'=>'Raleigh News and Observer'),
             array('name'=>'Salisbury Post'),
             array('name'=>'Statesville Record and Landmark'),
             array('name'=>'SunJournal'),
             array('name'=>'Thoughtbox'),
             array('name'=>'Triangle Business Journal'),
             array('name'=>'UNC Charlotte'),
             array('name'=>'Vimeo'),
             array('name'=>'www.wbtv.com'),
             array('name'=>'www.wcnc.com'),
             array('name'=>'WFAE'),
             array('name'=>'www.wilsoncenter.org'),
             array('name'=>'Winston-Salem Journal'),
             array('name'=>'Email'),
             array('name'=>'UI Projects'),
          ));
       }
       
}
