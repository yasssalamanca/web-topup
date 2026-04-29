<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProviderService;

class SyncProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tarik data game dan harga dari Provider ke Database kita';

    /**
     * Execute the console command.
     */
    public function handle(ProviderService $providerService)
    {
        $this->info('Mulai narik data produk... Sabar yak...');
        
        try {
            $providerService->syncProducts();
            $this->info('Mantap! Semua produk udah masuk database.');
        } catch (\Exception $e) {
            $this->error('Waduh error: ' . $e->getMessage());
        }
    }
}