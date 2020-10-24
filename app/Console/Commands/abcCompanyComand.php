<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class abcCompanyComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'command:name';
//    protected $signature = 'contact:company {name} {phone_number?}';
//    protected $signature = 'contact:company {name} {phone_number=N/A}';
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
//    protected $description = 'Command description';
    protected $description = 'ads new company';

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
        $name = $this->ask('What is your company Name?');
        $phone_number = $this->ask('What is your companies phone no ?');

        if ($this->confirm('Are you ready to insert'.$name."?")){
            $company = Company::create([
               'name' => $name,
                'phone_number' => $phone_number
            ]);
            return $this->info('added_name : '. $company->name . ' Added_phone : '. $company->phone_number);
        }
        $this->warn('No data added ');

//        $company = Company::create([
//          'name' => $this->argument('name'),
////          'phone_number' => $this->argument('phone_number') ?? 'N/A'
//          'phone_number' => $this->argument('phone_number')
//        ]);
//        $this->info('added_name : '. $company->name . ' Added_phone : '. $company->phone_number);

//        $this->info('info string here');
//        $this->warn('this is warning');
//        $this->error('this is an error');
    }
}
