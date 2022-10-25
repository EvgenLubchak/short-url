<?php

declare(strict_types=1);

namespace App\DTO\URL;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;
use App\DTO\Casters\CarbonURLLifetimeCaster;
use Carbon\Carbon;

class StoreRequestDTO extends DataTransferObject
{
    public string $url;
    public int $transition_limit;
    #[CastWith(CarbonURLLifetimeCaster::class)]
    public Carbon $lifetime;
}
