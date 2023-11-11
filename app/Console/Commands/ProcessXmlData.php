<?php

namespace App\Console\Commands;

use App\Models\DataEntry;
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
     */
    public function handle()
    {
        try {

            $file = $this->argument('file');

            if (!file_exists($file)) {
                Log::error("The file {$file} does not exist.");
                $this->error("The file {$file} does not exist.");
                return;
            }

            $xml = simplexml_load_file($file);

            if (!$xml) {
                Log::error("The file {$file} is not a valid XML file.");
                $this->error("The file {$file} is not a valid XML file.");
                return;
            }

            $json = json_encode($xml);


            DataEntry::create([
                'xml_data' => $json,
            ]);

            Log::info("The XML data from {$file} has been processed and stored in the database.");
            $this->info("The XML data from {$file} has been processed and stored in the database.");

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error("An error occurred while processing the XML data: {$e->getMessage()}");
        }
    }
}
