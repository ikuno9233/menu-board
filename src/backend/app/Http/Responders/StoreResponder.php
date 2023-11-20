<?php

declare(strict_types=1);

namespace App\Http\Responders;

use Illuminate\Http\RedirectResponse;

class StoreResponder
{
    /**
     * @param array $result
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(array $result): RedirectResponse
    {
        if (!is_null($result['errors'])) {
            return response()->redirectToRoute('show_edit_form')->withInput()->withErrors($result['errors']);
        }

        return response()->redirectToRoute('show_main');
    }
}
