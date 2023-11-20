<?php

declare(strict_types=1);

namespace App\Http\Domains;

use App\Models\Menu;

class ShowEditFormDomain
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        $menus = [];
        for ($i = 0; $i < 7; $i++) {
            $date = today()->startOfWeek()->addDays($i);

            $menus[] = [
                'date' => $date,
                'menu' => Menu::firstWhere('date', $date),
            ];
        }

        return [
            'menus' => $menus,
        ];
    }
}
