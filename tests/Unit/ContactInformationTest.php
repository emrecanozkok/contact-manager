<?php

namespace Tests\Unit;

use App\Models\Contact;
use App\Models\ContactInformation;
use App\Models\User;
use Laravel\Passport\Passport;
use Mockery;
use Tests\TestCase;


class ContactInformationTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        //Contact::truncate();
        Contact::factory()->count(1)->create();
    }

    public function test_user_can_add_contact_information()
    {
        $user = User::factory()->create();
        $latestContact = Contact::orderBy('created_at', 'desc')->get()->first();

        Passport::actingAs($user)->token();

        $token = $user->createToken('test')->accessToken;

        $headers = ['Authorization' => sprintf('Bearer %s', $token)];
        $payload = ContactInformation::factory()->count(1)->make()->first()->toArray();

        $response = $this->json('POST', route('informations.store', [$latestContact->id]), $payload, $headers);
        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id', 'information_type', 'information_content'
                ],
                'status'
            ]);
    }

    /**
     * @depends test_user_can_add_contact_information
     */
    public function test_user_can_delete_contact_information()
    {
        $user = User::orderBy('created_at', 'desc')->get()->first();
        $latestContact = Contact::orderBy('created_at', 'desc')->get()->first();
        $latestContact->informations()->create(ContactInformation::factory()->count(1)->make()->first()->toArray());
        $latestContact = Contact::with('informations')->orderBy('created_at', 'desc')->get()->first();

        Passport::actingAs($user)->token();
        $token = $user->createToken('test')->accessToken;

        $headers = ['Authorization' => sprintf('Bearer %s', $token)];
        $payload = Contact::factory()->count(1)->make()->first()->toArray();
        $response = $this->json('DELETE', route('informations.destroy',
            [
                $latestContact->id,
                $latestContact->informations->first()->id
            ]
        ), $payload, $headers);

        $response->assertNoContent(200);
    }
}
