<?php

namespace Tests\Unit;

use App\Models\Contact;
use App\Models\User;
use Laravel\Passport\Passport;
use Mockery;
use Tests\TestCase;


class ContactTest extends TestCase
{

    public function test_user_can_add_contact()
    {
        $user = User::factory()->create();
        Passport::actingAs($user)->token();

        $token = $user->createToken('test')->accessToken;

        $headers = ['Authorization' => sprintf('Bearer %s', $token)];
        $payload = Contact::factory()->count(1)->make()->first()->toArray();

        $response = $this->json('POST', route('contacts.store'), $payload, $headers);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data',
                'status'
            ]);
    }

    public function test_user_can_get_contact()
    {
        $user = User::orderBy('created_at', 'desc')->get()->first();
        Passport::actingAs($user)->token();

        $token = $user->createToken('test')->accessToken;

        $headers = ['Authorization' => sprintf('Bearer %s', $token)];

        $response = $this->json('GET', route('contacts.index'), [], $headers);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status'
            ]);
    }

    public function test_user_can_update_contact()
    {
        $user = User::orderBy('created_at', 'desc')->get()->first();
        $latestContact = Contact::orderBy('created_at', 'desc')->get()->first();
        Passport::actingAs($user)->token();

        $token = $user->createToken('test')->accessToken;

        $headers = ['Authorization' => sprintf('Bearer %s', $token)];
        $payload = Contact::factory()->count(1)->make()->first()->toArray();
        $response = $this->json('PUT', route('contacts.update', ['contact' => $latestContact->id]), $payload, $headers);

        $response->assertNoContent(200);
    }

    public function test_user_can_get_single_contact()
    {
        $user = User::orderBy('created_at', 'desc')->get()->first();
        $latestContact = Contact::orderBy('created_at', 'desc')->get()->first();
        Passport::actingAs($user)->token();

        $token = $user->createToken('test')->accessToken;

        $headers = ['Authorization' => sprintf('Bearer %s', $token)];

        $response = $this->json('GET', route('contacts.show',[$latestContact->id]), [], $headers);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id','name','company','last_name','photo_url'
                ],
                'status'
            ]);
    }

    public function test_user_can_delete_contact()
    {
        $user = User::orderBy('created_at', 'desc')->get()->first();
        $latestContact = Contact::orderBy('created_at', 'desc')->get()->first();
        Passport::actingAs($user)->token();

        $token = $user->createToken('test')->accessToken;

        $headers = ['Authorization' => sprintf('Bearer %s', $token)];
        $payload = Contact::factory()->count(1)->make()->first()->toArray();
        $response = $this->json('DELETE', route('contacts.destroy', ['contact' => $latestContact->id]), $payload, $headers);

        $response->assertNoContent(200);
    }

}
