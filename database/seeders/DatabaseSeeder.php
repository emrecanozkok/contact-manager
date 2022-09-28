<?php

namespace Database\Seeders;

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
        // Here we are creating a collection of 1 Team models

        $contacts = \App\Models\Contact::factory()->count(2000)->create();

        $contacts->each(function($contact) {
            $contactInformations = \App\Models\ContactInformation::factory()->count(10)->make();
            $contactInformations->each(function($contactInformation) use ($contact) {
                $contact->informations()->create($contactInformation->toArray());
            });
        });
    }
}
