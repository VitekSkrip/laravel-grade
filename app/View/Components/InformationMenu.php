<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InformationMenu extends Component
{
    public array $menu = [
        [
            'title' => 'О компании',
            'route' => 'about',
        ],
        [
            'title' => 'Каталог',
            'route' => 'catalog',
        ],
        [
            'title' => 'Контактная информация',
            'route' => 'contacts',
        ],
        [
            'title' => 'Финансовый отдел',
            'route' => 'finances',
        ],
        [
            'title' => 'Для клиентов',
            'route' => 'clients',
        ],
    ];

    public function __construct(public readonly string $template)
    {
    }

    public function render(): View|string|Closure
    {
        return view('components.information-menu.' . $this->template);
    }
}
