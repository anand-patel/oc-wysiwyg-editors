<?php

return [
    'plugin' => [
        'name' => 'Wysiwyg editory',
        'description' => 'Vložte svůj oblíbený Wysiwyg editor do CMS a dalších editorů kódu'
    ],
    'settings' => [
        'label' => 'Wysiwyg editory',
        'description' => 'Nastavení předvoleb Wysiwyg editorů.'
    ],
    'widget' => [
        'label' => 'Wysiwyg',
        'name' => 'Wysiwyg editory',
        'description' => 'Vykreslí Wysiwyg editor dle vašeho výběru',
    ],
    'form' => [
	    'settings' => [
		    'select_editor' => 'Použitý typ editoru',
		    'editor_width' => 'Šířka editoru',
		    'editor_height' => 'Výška editoru'
	    ],
	    'page' => [
		    'label' => 'Použít editor pro stránky?',
		    'comment' => 'Použije editor pro stránky (Pages)'
	    ],
        'content' => [
            'label' => 'Použít editor pro obsahové bloky?',
            'comment' => 'Použije editor pro obsahové bloky (Content)'
        ],
        'partial' => [
            'label' => 'Použít editor pro prvky stránek?',
            'comment' => 'Použije editor pro prvky stránek (Partials)'
        ],
        'layout' => [
            'label' => 'Použije editor pro layouty?',
            'comment' => 'Použije editor pro layout stránek (Layouts)'
        ],
        'others' => [
            'label' => 'Použít editor pro vše ostatní?',
            'comment' => 'Nahradí všechny výskyty editoru kódu ve všech pluginech s vyjímkou CMS (Stránky, Obsahové bloky, Prvky stránky a Layouty)'
        ],
        'problog' => [
            'label' => 'Použít pro Radiantweb Problog?',
            'comment' => 'Použije Wysiwyg editor pro Radientweb Problog plugin jako editor článků'
        ],
        'proevent' => [
            'label' => 'Použít pro Radiantweb ProEvents?',
            'comment' => 'Použije Wysiwyg editor pro Radientweb ProEvents plugin jako editor detailů událostí'
        ],
        'spages' => [
            'label' => 'Použít pro RainLab Static Pages?',
            'comment' => 'Použije Wysiwyg editor pro RainLab Static Pages plugin jako editor stránek'
        ],
        'blog' => [
            'label' => 'Použít pro RainLab Blog?',
            'comment' => 'Použije Wysiwyg editor pro RainLab blog plugin jako editor článků'
        ],
        'apages' => [
            'label' => 'Použít pro Autumn Pages?',
            'comment' => 'použije Wysiwyg editor pro Autumn page plugin jako editor stránek'
        ],
        'tab' => [
            'settings' => 'Nastavení editoru',
            'content' => 'Použití editoru'
        ]
    ]
];
