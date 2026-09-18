<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use Database\Seeders\PortfolioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(PortfolioSeeder::class);
    }

    /**
     * Test the portfolio page loads successfully and contains all 7 core sections.
     */
    public function test_portfolio_page_renders_with_all_sections(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // 1. Picture + Bio
        $response->assertSee('Alexander Vance');
        $response->assertSee('Senior Full-Stack Engineer');
        $response->assertSee('Crafting enduring, high-performance web systems');

        // 2. Education
        $response->assertSee('University of California, Berkeley');
        $response->assertSee('Bachelor of Science in Computer Science');

        // 3. Experience
        $response->assertSee('Lumina Cloud Infrastructure');
        $response->assertSee('Lead Full-Stack Engineer');

        // 4. Projects (including repo and demo links)
        $response->assertSee('Aura Task Orchestrator');
        $response->assertSee('Chronicle Docs Engine');
        $response->assertSee('Source Repo');
        $response->assertSee('Live Demo');
        $response->assertSee('https://github.com/alexandervance-dev/aura-orchestrator');

        // 5. Programming Languages & Frameworks
        $response->assertSee('PHP 8.x');
        $response->assertSee('Laravel Framework');
        $response->assertSee('Material Web Components (M3)');
        $response->assertSee('Tailwind CSS');

        // 6. Contact Person
        $response->assertSee('Contact Person & Details', false);
        $response->assertSee('alexander.vance.dev@gmail.com');
        $response->assertSee('+1 (415) 890-4321');

        // 7. Invitation to work together
        $response->assertSee('Let’s Build Something Enduring Together', false);
        $response->assertSee('Transmit Project Inquiry');
    }

    /**
     * Test submitting the collaboration / contact form saves to database.
     */
    public function test_contact_form_submission_success(): void
    {
        $formData = [
            'name' => 'Eleanor Roosevelt',
            'email' => 'eleanor@example.com',
            'subject' => 'Architectural Consulting for FinTech Platform',
            'project_type' => 'Laravel Backend & Architecture',
            'budget' => '$15k - $40k+ (Enterprise architecture)',
            'message' => 'We would love to discuss a complete re-architecture of our core payments pipeline.',
        ];

        $response = $this->postJson(route('contact.store'), $formData);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Eleanor Roosevelt',
            'email' => 'eleanor@example.com',
            'subject' => 'Architectural Consulting for FinTech Platform',
        ]);
    }

    /**
     * Test contact form validation failure when required fields are missing.
     */
    public function test_contact_form_validation_failure(): void
    {
        $response = $this->postJson(route('contact.store'), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'subject', 'message']);
    }
}
