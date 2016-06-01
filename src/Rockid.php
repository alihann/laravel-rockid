<?php

namespace Alihann\LaravelRockid;

use Jenssegers\Optimus\Optimus;

/**
 * Class Rockid
 *
 * @author Ali Han <le3han@gmail.com>
 */
class Rockid implements ObfuscatorInterface
{
    /**
     * Optimus instance.
     *
     * @var Optimus
     */
    protected $obfuscator;

    /**
     * Rockid constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->obfuscator = new Optimus(
            config('rockid.prime'),
            config('rockid.inverse'),
            config('rockid.random')
        );
    }

    /**
     * Encode the given integer.
     *
     * @param int $value
     *
     * @return int
     */
    public function encode($value)
    {
        return $this->obfuscator->encode($value);
    }

    /**
     * Decode the given integer.
     *
     * @param int $value
     *
     * @return int
     */
    public function decode($value)
    {
        return $this->obfuscator->decode($value);
    }
}