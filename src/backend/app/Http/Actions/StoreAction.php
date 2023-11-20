<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Domains\StoreDomain;
use App\Http\Responders\StoreResponder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StoreAction extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Domains\StoreDomain $domain
     * @param \App\Http\Responders\StoreResponder $responder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, StoreDomain $domain, StoreResponder $responder): RedirectResponse
    {
        return $responder($domain([
            'inputs' => $request->all(),
        ]));
    }
}
