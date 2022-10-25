<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\URL\StoreRequestDTO;
use App\Models\Url;
use App\Repositories\URLRepository;
use Carbon\Carbon;

class URLService
{
    /**
     * @param URLRepository $URLRepository
     */
    public function __construct(private URLRepository $URLRepository)
    {
    }

    /**
     * Store url
     *
     * @param StoreRequestDTO $storeRequestDTO
     * @return Url
     */
    public function store(StoreRequestDTO $storeRequestDTO): Url
    {
        $data = [];
        $data['transition_limit'] = $storeRequestDTO->transition_limit;
        $data['token'] = $this->URLRepository->uniqueTokenStr();
        $data['url'] = $storeRequestDTO->url;
        $data['lifetime'] = $storeRequestDTO->lifetime->toDateTimeString();
        return $this->URLRepository->create($data);
    }

    /**
     * Handle redirect check url lifetime, transition limit, decrease transition limit
     *
     * @param Url $url
     * @return bool
     */
    public function handleRedirect(Url $url): bool
    {
        $now = Carbon::now();
        $lifeTime = Carbon::createFromDate($url->lifetime);
        if( $now->greaterThan($lifeTime) ){
            return false;
        }
        if( $url->transition_limit < 0 ){
            return false;
        }
        if( $url->transition_limit != 0 ){
            $this->URLRepository->decreaseTransitionLimit($url);
        }
        return true;
    }
}
