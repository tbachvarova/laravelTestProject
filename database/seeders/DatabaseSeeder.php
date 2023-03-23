<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Generate randomly
       //  User::factory(5)->create();

        // create a single User with spec fields
         $user = User::factory()->create([
             'name' => 'Tedy Test',
             'email' => 'teodora.sivkova@gmail.com'
         ]);

         // Generate randomly
         //Listing::factory(6)->create();

        // create Posts with spec fields
         Listing::factory(10)->create([
             'user_id' => $user->id
         ]);


/*
        Listing::create([
            'title' => 'Laravel Senior Developer',
            'tags' => 'laravel, javascript',
            'company' => 'Acme Corp',
            'location' => 'Boston, MA',
            'email' => 'email1@email.com',
            'website' => 'https://www.acme.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        Listing::create([
            'title' => 'Laravel Developer',
            'tags' => 'laravel, vue, javascript',
            'company' => 'Wayne Enterprises',
            'location' => 'Gotham, NY',
            'email' => 'email3@email.com',
            'website' => 'https://www.wayneenterprises.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);
*/

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
