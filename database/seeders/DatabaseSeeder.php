<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use id;
use App\Models\Gig;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'John@gmail.com'
        ]);

        Gig::factory(6)->create([
            'user_id' => $user->id
        ]);
        

        // Gig::create([
        //     'title' => 'Laravel Senior',
        //     'tags' => 'laravel, djnago',
        //     'company' => 'Acme Corg',
        //     'location' => 'Lagos, Nigeria',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'A wonderful company'
        // ]);
        // Gig::create([
        //     'title' => 'django Senior',
        //     'tags' => 'React, djnago',
        //     'company' => 'New Corg',
        //     'location' => 'Lagos, Nigeria',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.new.com',
        //     'description' => 'working for innovation'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
