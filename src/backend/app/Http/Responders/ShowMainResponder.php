<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Http\Response;

class ShowMainResponder
{
    /**
     * @param array $dto
     * @return \Illuminate\Http\Response
     */
    public function __invoke(array $dto): Response
    {
        return response()->view('main', [
            'menus' => $dto['menus'],
        ]);
    }
}
