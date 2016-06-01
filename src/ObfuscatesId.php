<?php

namespace Alihann\LaravelRockid;

use Illuminate\Support\Facades\App;

/**
 * Trait ObfuscatesId
 *
 * @author Ali Han <le3han@gmail.com>
 */
trait ObfuscatesId
{
    /**
     * Get obscured form of the model's route key.
     *
     * @return mixed
     */
    public function getId()
    {
        $key = $this->getRouteKeyName();
        return App::make('rockid')->encode($this->$key);
    }
}