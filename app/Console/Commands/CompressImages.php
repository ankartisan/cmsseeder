<?php namespace App\Console\Commands;

use App\Models\Asset;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CompressImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compress-images {--limit=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compress existing images';

    /**
     * Create a new command instance.
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
        $limit = $this->option('limit') ? $this->option('limit') : 10;

        $assets = Asset::where('data', 'NOT LIKE', '%compressed%')->orWhereNull('data')
                                                                  ->orderBy('created_at', 'asc')
                                                                  ->limit($limit)
                                                                  ->get();

        foreach($assets as $asset) {
            $asset->compress();
        }

        $this->comment(count($assets) ." images compress");


    }
}