<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class XmlProcessCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /*public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    */

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    public function test_it_can_process_xml_file_and_save_data_to_database(): void
    {
        $file = base_path('feed.xml');
        $this->artisan('xml:process', [
            'file' => $file,
        ])->expectsOutput("The XML data from {$file} has been processed and stored in the database.")->assertExitCode(0);

        $this->assertDatabaseCount('data_entries', 1, 'mysql');
    }

}
