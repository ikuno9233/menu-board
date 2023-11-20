<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Domains\ShowMainDomain;
use App\Http\Responders\ShowMainResponder;
use Illuminate\Http\Response;

class ShowMainAction extends Controller
{
    /**
     * @param \App\Http\Domains\ShowMainDomain $domain
     * @param \App\Http\Responders\ShowMainResponder $responder
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ShowMainDomain $domain, ShowMainResponder $responder): Response
    {
        return $responder($domain());
    }
}
