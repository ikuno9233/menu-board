<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use App\Http\Domains\ShowEditFormDomain;
use App\Http\Responders\ShowEditFormResponder;
use Illuminate\Http\Response;

class ShowEditFormAction extends Controller
{
    /**
     * @param \App\Http\Domains\ShowEditFormDomain $domain
     * @param \App\Http\Responders\ShowEditFormResponder $responder
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ShowEditFormDomain $domain, ShowEditFormResponder $responder): Response
    {
        return $responder($domain());
    }
}
