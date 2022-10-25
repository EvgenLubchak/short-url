<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\URL\StoreRequest;
use App\DTO\URL\StoreRequestDTO;
use App\Models\Url;
use App\Services\URLService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Illuminate\Http\Response;

class URLController extends Controller
{
    /**
     * @param URLService $URLService
     */
    public function __construct(private URLService $URLService)
    {
    }

    /**
     * Store url request
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     * @throws UnknownProperties
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $url = $this->URLService->store(new StoreRequestDTO($request->validated()));
        return redirect()->route('short.url', $url->id);
    }


    /**
     * Short url page
     *
     * @param Url $url
     * @return View
     */
    public function shortUrl(Url $url): View
    {
        return view('short-url')->with(['url' => $url]);
    }

    /**
     * Url redirect request
     *
     * @param Url $url
     * @return RedirectResponse
     */
    public function redirect(Url $url): RedirectResponse
    {
        $redirect = $this->URLService->handleRedirect($url);
        return $redirect ? redirect($url->url) : abort(Response::HTTP_NOT_FOUND);
    }
}
