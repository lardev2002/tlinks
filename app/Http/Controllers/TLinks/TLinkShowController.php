<?php

namespace App\Http\Controllers\TLinks;

use App\Http\Controllers\Controller;
use App\Services\TLinkService;

/**
 * Class TLinkShowController
 * @package App\Http\Controllers\TLinks
 */
class TLinkShowController extends Controller
{
    /**
     * @param TLinkService $linkService
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(TLinkService $linkService, string $token)
    {
        $link = $linkService->link($token);

        if ($link) {
            return redirect()->away($link);
        }

        abort(404);
    }
}
