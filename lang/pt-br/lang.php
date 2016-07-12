<?php

return [
    'plugin' => [
        'name' => 'Editores Wysiwyg',
        'description' => 'Permite usar o teu editor Wysiwyg favorito'
    ],
    'settings' => [
        'label' => 'Editores Wysiwyg',
        'description' => 'Configura as preferências de Editores Wysiwyg.'
    ],
    'widget' => [
        'label' => 'Wysiwyg',
        'name' => 'Editores Wysiwyg',
        'description' => 'Renderiza um editor wysiwyg à escolha do utilizador'
    ],
    'form' => [
        'settings' => [
            'select_editor' => 'Escolha o editor',
            'editor_width' => 'Largura do editor',
            'editor_height' => 'Altura do editor',
            'toolbar_label' => 'Personalização da barra de ferramentas',
            'toolbar_tinymce' => 'Documentação: http://www.tinymce.com/docs/advanced/editor-control-identifiers/#toolbarcontrols',
            'toolbar_ckeditor' => 'Documentação: http://docs.ckeditor.com/#!/guide/dev_toolbar'
        ],
        'page' => [
            'label' => 'Utilizar em Páginas?',
            'comment' => 'Permite usar o editor na edição de páginas'
        ],
        'content' => [
            'label' => 'Utilizar em Conteúdo?',
            'comment' => 'Permite usar o editor na edição de conteúdos'
        ],
        'partial' => [
            'label' => 'Utilizar em Blocos?',
            'comment' => 'Permite usar o editor na edição de blocos parciais'
        ],
        'layout' => [
            'label' => 'Utilizar em Layouts?',
            'comment' => 'Permite usar o editor na edição de layouts'
        ],
        'others' => [
            'label' => 'Usar em todos os outros casos?',
            'comment' => 'Permite usar o editor em todos os casos excepto em Páginas, Blocos, Layouts, Conteúdos'
        ],
        'spages' => [
            'label' => 'Utilizar em RainLab Static Pages?',
            'comment' => 'Permite usar no plugin RainLab Static Pages como editor de páginas'
        ],
        'blog' => [
            'label' => 'Utilizar em RainLab Blog?',
            'comment' => 'Permite usar no plugin RainLab Blog como editor de artigos'
        ],
        'problog' => [
            'label' => 'Utilizar em Radiantweb Problog?',
            'comment' => 'Permite usar no plugin Radientweb Problog como editor de artigos'
        ],
        'proevent' => [
            'label' => 'Utilizar em Radiantweb ProEvents?',
            'comment' => 'Permite user no plugin Radientweb ProEvents como editor de detalhes do evento'
        ],
        'apages' => [
            'label' => 'Utilizar em Autumn Pages?',
            'comment' => 'Permite usar no plugin Autumn Pages como editor de páginas'
        ],
        'cplus' => [
            'label' => 'Utilizar em Indikator Content Plus?',
            'comment' => 'Permite usar no plugin Indikator Content Plus como editor de conteúdo'
        ],
        'news' => [
            'label' => 'Utilizar em Indikator News & Newsletter?',
            'comment' => 'Permite usar no plugin Indikator News & Newsletter como editor de notícia'
        ],
        'tab' => [
            'settings' => 'Definições',
            'content' => 'Permissões',
            'section' => 'Plugins'
        ]
    ]
];
