<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Nathanmac\Utilities\Parser\Exceptions\ParserException;
use Nathanmac\Utilities\Parser\Parser;
use Spatie\ArrayToXml\ArrayToXml;

class UpdateCoursesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'courses:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'By running the command courses will be updated.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            \Log::info('Started updating courses...');
            $parser = new Parser();
            $xml = $parser->xml(\Storage::get('sample-rates.xml'));

            foreach ($xml['item'] as $key => $item) {
                $url = $item['in'];
                $val = (float)file_get_contents($url);

                $xml['item'][$key]['in'] = $val > 0 ? $val : 0;
            }

            \Storage::put('rates.xml', ArrayToXml::convert($xml, 'rates'));
            \Log::info('Finished updating courses...');
        } catch (FileNotFoundException $e) {
            \Log::error('Cannot update courses due to sample-rates.xml is not found!');
            return;
        } catch (ParserException $e) {
            \Log::error('Cannot parse sample-rates.xml due to invalid format.');
            return;
        }
    }
}
