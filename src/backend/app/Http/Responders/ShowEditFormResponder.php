<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Http\Response;

class ShowEditFormResponder
{
    /**
     * @param array $dto
     * @return \Illuminate\Http\Response
     */
    public function __invoke(array $dto): Response
    {
        return response()->view('edit_form', [
            'menus' => $dto['menus'],
        ]);
    }
}
