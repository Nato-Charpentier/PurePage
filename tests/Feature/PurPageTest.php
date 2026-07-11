<?php

namespace Tests\Feature;

use App\Mail\LeadSubmitted;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PurPageTest extends TestCase
{
    public function test_home_page_is_available_and_uses_the_expected_sections(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('id="tarifs"', false)
            ->assertSee('id="contact-form"', false)
            ->assertDontSee('href="#packs"', false);
    }

    public function test_legacy_contact_route_is_not_registered(): void
    {
        $this->post('/contact')->assertNotFound();
    }

    public function test_a_valid_lead_sends_an_email(): void
    {
        Mail::fake();

        $response = $this->postJson('/lead', [
            'name' => 'Test PurPage',
            'email' => 'client@example.com',
            'message' => 'Je souhaite discuter de mon projet web.',
            'pack' => 'Contact',
            'website' => '',
            'started_at' => (now()->timestamp * 1000) - 3000,
        ]);

        $response->assertOk()->assertJson(['ok' => true]);
        Mail::assertSent(LeadSubmitted::class, 1);
    }

    public function test_validation_errors_are_returned_as_json(): void
    {
        $this->postJson('/lead', [
            'started_at' => (now()->timestamp * 1000) - 3000,
        ])->assertUnprocessable()->assertJsonValidationErrors(['name', 'email', 'message']);
    }
}
