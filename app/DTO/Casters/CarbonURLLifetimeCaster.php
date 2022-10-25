<?php

declare(strict_types=1);

namespace App\DTO\Casters;

use Spatie\DataTransferObject\Caster;
use Carbon\Carbon;

class CarbonURLLifetimeCaster implements Caster
{
    /**
     * @param mixed $value
     * @return Carbon
     */
    public function cast(mixed $value): Carbon
    {
        return Carbon::now()->addHour($value);
    }
}
