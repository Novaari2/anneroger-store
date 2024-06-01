<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use Illuminate\Console\Command;

class SeedLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-location';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeding all location from RajaOngkir API';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Start seeding couriers');
        $this->call('db:seed', ['--class' => 'CourierSeeder']);
        $this->info('=======================================');
        $this->info('Finish seeding couriers with ' . Courier::count() . ' rows');
        $this->info('=======================================');

        $this->info('Start seeding provinces');
        $this->call('db:seed', ['--class' => 'ProvinceSeeder']);
        $this->info('=======================================');
        $this->info('Finish seeding provinces with ' . Province::count() . ' rows');
        $this->info('=======================================');

        $this->info('Start seeding cities');
        $this->call('db:seed', ['--class' => 'CitySeeder']);
        $this->info('=======================================');
        $this->info('Finish seeding cities with ' . City::count() . ' rows');
        $this->info('=======================================');

        // $this->info('Start seeding subdistricts');
        // $this->call('db:seed', ['--class' => 'SubdistrictSeeder']);
        // $this->info('=======================================');
        // $this->info('Finish seeding subdistricts with ' . \App\Models\Subdistrict::count() . ' rows');
        // $this->info('=======================================');
    }
}
