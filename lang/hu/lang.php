<?php

return [
    'plugin' => [
        'name' => 'Szövegszerkesztők',
        'description' => 'A tartalmak formázása szövegszerkesztő használatával.'
    ],
    'settings' => [
        'label' => 'Szövegszerkesztő',
        'description' => 'Testreszabása és egyéb beállítások.'
    ],
    'widget' => [
        'label' => 'Szerkesztő',
        'name' => 'Szövegszerkesztő',
        'description' => 'A felhasználó által választott szerkesztő megjelenítése.'
    ],
    'form' => [
        'settings' => [
            'select_editor' => 'Szerkesztő',
            'editor_width' => 'Szélesség',
            'editor_height' => 'Magasság'
        ],
        'page' => [
            'label' => 'Használva legyen itt: Testreszabás - Lapok',
            'comment' => 'Szövegszerkesztő megjelenítése a tartalomnál.'
        ],
        'content' => [
            'label' => 'Használva legyen itt:  Testreszabás - Tartalom',
            'comment' => 'Szövegszerkesztő megjelenítése a tartalomnál.'
        ],
        'partial' => [
            'label' => 'Használva legyen itt: Testreszabás - Részlapok',
            'comment' => 'Szövegszerkesztő megjelenítése a tartalomnál.'
        ],
        'layout' => [
            'label' => 'Használva legyen itt: Testreszabás - Elrendezések',
            'comment' => 'Szövegszerkesztő megjelenítése a tartalomnál.'
        ],
        'others' => [
            'label' => 'Használva legyen egyéb helyeken is?',
            'comment' => 'Mindenhol, kivéve a fentebb beállított helyeket.'
        ],
        'problog' => [
            'label' => 'Használva legyen itt: Radiantweb - Problog',
            'comment' => 'Szövegszerkesztő megjelenítése a bejegyzésnél.'
        ],
        'proevent' => [
            'label' => 'Használva legyen itt: Radiantweb - ProEvents',
            'comment' => 'Szövegszerkesztő megjelenítése a leírásnál.'
        ],
        'spages' => [
            'label' => 'Használva legyen itt: RainLab - Static Pages',
            'comment' => 'Szövegszerkesztő megjelenítése a tartalomnál.'
        ],
        'blog' => [
            'label' => 'Használva legyen itt: RainLab - Blog',
            'comment' => 'Szövegszerkesztő megjelenítése a bejegyzésnél.'
        ],
        'apages' => [
            'label' => 'Használva legyen itt: Autumn - Pages',
            'comment' => 'Szövegszerkesztő megjelenítése a tartalomnál.'
        ],
        'tab' => [
            'settings' => 'Beállítások',
            'content' => 'Tartalom'
        ]
    ]
];
