<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Url;
use Illuminate\Support\Str;

class URLRepository
{
    /**
     * Create new Url entity
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Url::create($data);
    }

    /**
     * Return unique db token string
     *
     * @return string
     */
    function uniqueTokenStr() {
        do {
            $token = Str::random(8);
        } while (Url::whereToken($token)->first() instanceof Url);
        return $token;
    }

    /**
     * Decrease transition limit counter
     *
     * @param Url $url
     */
    public function decreaseTransitionLimit(Url $url)
    {
        if( $url->transition_limit == 1 ) {
            $url->transition_limit = -999;
        } else {
            $url->transition_limit = --$url->transition_limit;
        }
        $url->save();
    }
}
