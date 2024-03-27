<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'name' => 'user',
            'email' => 'test@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'John',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'admin',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'johan',
            'email' => 'johan@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'john',
            'email' => 'john@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'jaap',
            'email' => 'jaap@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'kees',
            'email' => 'kees@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'chris',
            'email' => 'chris@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'simon',
            'email' => 'simon@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'finn',
            'email' => 'finn@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'klaas',
            'email' => 'klaas@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'joeri',
            'email' => 'joeri@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'tim',
            'email' => 'tim@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'gerrit',
            'email' => 'gerrit@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'lennard',
            'email' => 'lennard@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);

        \App\Models\User::create([
            'name' => 'wessel',
            'email' => 'wessel@test.nl',
            'password' => Hash::make('testtest'),
            'role' => 'user',
            'voornaam' => 'Jaap',
            'achternaam' => 'De',
            'woonplaats' => 'Volendam',
            'postcode' => '1122 AB',
            'geboortedatum' => '2000-01-01',
            'totalPoints' => '0',
        ]);
    }
}
