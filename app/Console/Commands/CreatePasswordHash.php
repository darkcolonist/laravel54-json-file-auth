<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreatePasswordHash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'password:create {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a password given plaintext';

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
      $hashed = Hash::make($this->argument('text'));
      $this->info($hashed);
    }
}
