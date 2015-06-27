<?php

return [
    'plugin' => [
        'name' => 'Wysiwyg Editors',
        'description' => 'Добавляет поддержку сторонних Wysiwig Редакторов'
    ],
    'settings' => [
        'label' => 'Wysiwyg Editors',
        'description' => 'Настроить редактор Wysiwig.'
    ],
    'widget' => [
        'label' => 'Wysiwyg',
        'name' => 'Wysiwyg Editors',
        'description' => 'Отрисовывает выбранный пользователем Wysiwig редактор',
    ],
    'form' => [
        'settings' => [
            'select_editor' => 'Выберите редактор',
            'editor_width' => 'Ширина редактора',
            'editor_height' => 'Высота редактора'
        ],
        'page' => [
            'label' => 'Использовать в CMS - Страницах?',
            'comment' => 'Использовать Wysiwig редактор на Страницах CMS'
        ],
        'content' => [
            'label' => 'Использвать в CMS - Содержимом?',
            'comment' => 'Использовать Wysiwig редактор в Содержимом CMS'
        ],
        'partial' => [
            'label' => 'Использовать в CMS - Фрагментах?',
            'comment' => 'Использовать Wysiwig редактор в Фрагментах CMS'
        ],
        'layout' => [
            'label' => 'Использовать в CMS - Шаблонах?',
            'comment' => 'Использовать Wysiwig редактор в Шаблонах CMS'
        ],
        'others' => [
            'label' => 'Использовать для остального?',
            'comment' => 'Заменяет во всех плагинах обычный Code Editor на Wysiwig редактор, за исключением CMS (Страницы, Фрагменты, Шаблоны, Содержимое)'
        ],
        'problog' => [
            'label' => 'Использовать в Radiantweb Problog?',
            'comment' => 'Использовать Wysiwig редактор в плагине Radientweb Problog, как редактор постов'
        ],
        'proevent' => [
            'label' => 'Использовать в Radiantweb ProEvents?',
            'comment' => 'Использовать Wysiwig редактор в плагине Radientweb ProEvents, как редактор деталей событий'
        ],
        'spages' => [
            'label' => 'Использовать в RainLab Static Pages?',
            'comment' => 'Использовать Wysiwig редактор в плагине RainLab Static Pages, как редактор страниц'
        ],
        'blog' => [
            'label' => 'Использовать RainLab Blog?',
            'comment' => 'Использовать Wysiwig редактор в плагине RainLab Blog, как редактор постов'
        ],
        'apages' => [
            'label' => 'Использовать в Autumn Pages?',
            'comment' => 'Использовать Wysiwig редактор в плагине Autumn, как редактор страниц'
        ],
        'tab' => [
            'settings' => 'Настройки',
            'content' => 'Содержимое'
        ]
    ]
];
