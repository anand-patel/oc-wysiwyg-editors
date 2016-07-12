<?php

return [
    'plugin' => [
        'name' => 'Szövegszerkesztő',
        'description' => 'A tartalmak formázása szövegszerkesztő használatával.'
    ],
    'settings' => [
        'label' => 'Szövegszerkesztő',
        'description' => 'Beállítások a weboldal tartalmának szerkesztéséhez.'
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
            'editor_height' => 'Magasság',
            'toolbar_label' => 'Eszköztár',
            'toolbar_tinymce' => 'Dokumentáció: http://www.tinymce.com/docs/advanced/editor-control-identifiers/#toolbarcontrols',
            'toolbar_ckeditor' => 'Dokumentáció: http://docs.ckeditor.com/#!/guide/dev_toolbar'
        ],
        'page' => [
            'label' => 'Az alábbi oldalon: Lapok',
            'comment' => 'A Testreszabás menüpontban.'
        ],
        'content' => [
            'label' => 'Az alábbi oldalon: Tartalom',
            'comment' => 'A Testreszabás menüpontban.'
        ],
        'partial' => [
            'label' => 'Az alábbi oldalon: Részlapok',
            'comment' => 'A Testreszabás menüpontban.'
        ],
        'layout' => [
            'label' => 'Az alábbi oldalon: Elrendezések',
            'comment' => 'A Testreszabás menüpontban.'
        ],
        'others' => [
            'label' => 'Megjelenjen egyéb helyeken is?',
            'comment' => 'A listában nem szereplő oldalakon.'
        ],
        'spages' => [
            'label' => 'Az alábbi menüben: Lapok',
            'comment' => 'A RainLab bővítményében.'
        ],
        'blog' => [
            'label' => 'Az alábbi menüben: Blog',
            'comment' => 'A RainLab bővítményében.'
        ],
        'problog' => [
            'label' => 'Az alábbi menüben: Problog',
            'comment' => 'A Radiantweb bővítményében.'
        ],
        'proevent' => [
            'label' => 'Az alábbi menüben: ProEvents',
            'comment' => 'A Radiantweb bővítményében.'
        ],
        'apages' => [
            'label' => 'Az alábbi menüben: Pages',
            'comment' => 'Az Autumn bővítményében.'
        ],
        'cplus' => [
            'label' => 'Az alábbi menüben: Tartalom',
            'comment' => 'Az Indikátor bővítményében.'
        ],
        'news' => [
            'label' => 'Az alábbi menüben: Hírek',
            'comment' => 'Az Indikátor bővítményében.'
        ],
        'tab' => [
            'settings' => 'Beállítások',
            'content' => 'Megjelenés',
            'section' => 'Bővítmények'
        ]
    ]
];
