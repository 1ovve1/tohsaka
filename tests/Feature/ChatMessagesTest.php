<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ChatMessagesTest extends TestCase
{
    /** @var User fake user instance */
    protected User $user;
    /** @var self authorized entity */
    protected self $auths;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();

        $this->user = $user;
        $this->auths = $this->actingAs($user);
    }

    public function test_index_chat_messages(): void
    {
        $response = $this->auths->get('/api/chat/message');

        $response->assertJson(fn(AssertableJson $json) =>
            $json->has('data')->whereType('data', 'array')
        );
        $response->assertStatus(200);
    }

    public function test_create_chat_message(): void
    {
        $sample_body = "test";

        $response = $this->auths->post('/api/chat/message', ['body' => $sample_body]);

        $response->assertJson(fn(AssertableJson $json) =>
            $json
                ->where('data.user_id', $this->user->id)
                ->where('data.body', $sample_body)
                ->where('data.title', $this->user->name)
                ->etc()
        );
    }
}
