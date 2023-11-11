<?php

namespace App\Console\Commands;

use App\Models\DataEntry;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessXmlData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:process {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process XML data and store it in the database';

    /**
     * Execute the console command.
     * @return void
     * @throws Exception
     */
    public function handle()
    {
        try {

            /**
             * Getting the file path from the command line argument
             */
            $file = $this->argument('file');

            /**
             * Checking if the file exists
             */
            if (!file_exists($file)) {
                /**
                 * If the file does not exist, log an error and display an error message
                 */
                Log::error("The file {$file} does not exist.");
                $this->error("The file {$file} does not exist.");
                return;
            }


            /**
             * Loading the XML file
             */
            $xml = simplexml_load_file($file);

            /**
             * Checking if the file is a valid XML file
             */
            if (!$xml) {
                /**
                 * If the file is not a valid XML file, log an error and display an error message
                 */
                Log::error("The file {$file} is not a valid XML file.");
                $this->error("The file {$file} is not a valid XML file.");
                return;
            }

            /**
             * Converting the XML data to JSON
             */
            $json = json_encode($xml);


            /**
             * Storing the XML data in the database
             */
            DataEntry::create([
                'xml_data' => $json,
            ]);

            /**
             * Log a success message and display a success message
             */
            Log::info("The XML data from {$file} has been processed and stored in the database.");
            $this->info("The XML data from {$file} has been processed and stored in the database.");

        } catch (Exception $e) {
            /**
             * Log an error and display an error message
             */
            Log::error($e->getMessage());
            $this->error("An error occurred while processing the XML data: {$e->getMessage()}");
        }
    }
}
