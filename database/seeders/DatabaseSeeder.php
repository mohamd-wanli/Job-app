<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();
           $user=User::factory()->create([
            'name'=>'mohamd wanli',
            'email'=>'wlmohamd123@gmail.com'
           ]);
          



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Listing::create([
            'user_id'=>$user->id,
            'title'=>'Laravel senior Developer',
            'tags'=>'Larvel , java script',
            'company'=>'Acme corp',
            'email'=>'email@email.com',
            'website'=>'https://www.acme.com',
            'location'=>'Boston,MA',
            'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Ipsum autem ea totam dicta cum illum aspernatur magnam animi cumque
              non nostrum similique possimus optio, quisquam cupiditate laboriosam
              nisi repudiandae ab.'
        ]);
           
        Listing::create([
            'user_id'=>$user->id,
            'title'=>'Full stack Engineer',
            'tags'=>'Larvel , backend ,api',
            'company'=>'Stark industries',
            'website'=>'https://www.starkindustries.com',
            'email'=>'email@email.com',
            'location'=>'New York,NY',
            'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Ipsum autem ea totam dicta cum illum aspernatur magnam animi cumque
              non nostrum similique possimus optio, quisquam cupiditate laboriosam
              nisi repudiandae ab.'
        ]);














    }
}
