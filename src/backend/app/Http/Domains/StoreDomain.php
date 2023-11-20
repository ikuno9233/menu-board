<?php

declare(strict_types=1);

namespace App\Http\Domains;

use App\Models\Menu;

class StoreDomain
{
    /**
     * @param array $request
     * @return array
     */
    public function __invoke(array $request): array
    {
        $inputs = $request['inputs'];

        $validator = validator($inputs, [
            '*_menu_breakfast' => ['nullable', 'max:255'],
            '*_menu_lunch' => ['nullable', 'max:255'],
            '*_menu_dinner' => ['nullable', 'max:255'],
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator,
            ];
        }

        for ($i = 0; $i < 7; $i++) {
            $date = today()->startOfWeek()->addDays($i);
            $dow = strtolower($date->format('D'));

            Menu::updateOrCreate([
                'date' => $date,
            ], [
                'menu_breakfast' => $inputs["{$dow}_menu_breakfast"],
                'menu_lunch' => $inputs["{$dow}_menu_lunch"],
                'menu_dinner' => $inputs["{$dow}_menu_dinner"],
            ]);
        }

        return [
            'errors' => null,
        ];
    }
}
