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
        /**
         * Call the parent setup method otherwise the database will not be migrated
         */
        parent::setUp();

        /**
         * Migrate the database
         */
        $this->artisan('migrate');
    }

    /**
     * @test
     */
    public function test_it_can_process_xml_file_and_save_data_to_database(): void
    {
        /**
         * Defining the path to the XML file within the base path
         */
        $file = base_path('feed.xml');

        /**
         * Run the command and assert that the output matches the expected output
         */
        $this->artisan('xml:process', [
            'file' => $file,
        ])->expectsOutput("The XML data from {$file} has been processed and stored in the database.")->assertExitCode(0);

        /**
         * Assert that the database has one record
         */
        $this->assertDatabaseCount('data_entries', 1, 'mysql');
    }

}
