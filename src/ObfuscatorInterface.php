<?php

namespace Alihann\LaravelRockid;

/**
 * Interface ObfuscatorInterface
 *
 * @author Ali Han <le3han@gmail.com>
 */
interface ObfuscatorInterface
{
    /**
     * Encode the given integer.
     *
     * @param int $value
     *
     * @return int
     */
    public function encode($value);

    /**
     * Decode the given integer.
     *
     * @param int $value
     *
     * @return int
     */
    public function decode($value);
}