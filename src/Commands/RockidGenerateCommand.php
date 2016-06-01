<?php

namespace Alihann\LaravelRockid\Commands;

use Illuminate\Console\Command;
use phpseclib\Math\BigInteger;
use phpseclib\Crypt\Random;

/**
 * Class RockidGenerateCommand
 *
 * @author Ali Han <le3han@gmail.com>
 */
class RockidGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rockid:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a prime number, an inverse prime and a random integer for Rockid config.';

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
        $maxInt = 2147483647;
        $min = new BigInteger(1e7);
        $max = new BigInteger($maxInt);
        $prime = $max->randomPrime($min, $max);
        $a = new BigInteger($prime);
        $b = new BigInteger($maxInt + 1);

        if (! $inverse = $a->modInverse($b))
        {
            $this->error(
                "An error accured during calculation. Please re-run 'php artisan rocid:generate'."
            );
            return;
        }

        $random = hexdec(bin2hex(Random::string(4))) & $maxInt;

        $this->info(
            "Generated numbers (Paste these in config/rockid.php) :\nprime: {$prime}\ninverse: {$inverse}\nrandom: {$random}"
        );
    }
}
