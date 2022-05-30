<?php

namespace App\Http\Controllers\TLinks;

use App\Http\Controllers\Controller;
use App\Http\Requests\TLinkStoreFormRequest;
use App\Services\TLinkService;
use App\Traits\LogTrait;

/**
 * Class TLinkController
 * @package App\Http\Controllers\TLinks
 */
class TLinkController extends Controller
{
    use LogTrait;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('tlinks.create');
    }

    /**
     * @param TLinkService $linkService
     * @param TLinkStoreFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TLinkService $linkService, TLinkStoreFormRequest $request)
    {
        try {
            $link = $linkService->generateTLink($request->getDto());

            return redirect()
                ->back()
                ->with('generatedTLink', $link);
        } catch (\Exception $exception) {
            $this->log($exception);
            return redirect()
                ->back()
                ->with('messageError', __('tlink.error_creating_link'));
        }
    }
}
