<?php

return [
    'plugin' => [
        'name' => 'Wysiwyg Editörleri',
        'description' => 'Wysiwyg Editorünüzü to CMS ve diğer Kod Editörüne ekleyin'
    ],
    'settings' => [
        'label' => 'Wysiwyg Editörleri',
        'description' => 'Wysiwyg editör tercihlerini bu bölümden yapılandırabilirsiniz.'
    ],
    'widget' => [
        'label' => 'Wysiwyg',
        'name' => 'Wysiwyg Editörleri',
        'description' => 'Kullanıcının seçtiği bir wysiwyg editörü oluşturur',
    ],
    'form' => [
        'settings' => [
            'select_editor' => 'Editör seç',
            'editor_width' => 'Editör Genişliği',
            'editor_height' => 'Editör Yüksekliği'
        ],
        'page' => [
            'label' => 'CMS için kullanım - Sayfa?',
            'comment' => 'CMS sayfasında Wysiwyg editörü kullanın'
        ],
        'content' => [
            'label' => 'CMS için kullanım - İçerik?',
            'comment' => 'CMS içeriğinde Wysiwyg editörü kullanın'
        ],
        'partial' => [
            'label' => 'CMS için kullanım - Kısmi?',
            'comment' => 'CMS parçasında Wysiwyg editörü kullanın'
        ],
        'layout' => [
            'label' => 'CMS için kullanım - Layout?',
            'comment' => 'CMS layoutunda Wysiwyg editörü kullanın'
        ],
        'others' => [
            'label' => 'Diğerleri için kullanım?',
            'comment' => 'CMS (Page, Kısmi, Düzen, İçerik) dışındaki tüm eklentileri Kod Editöründen Wysiwyg Editöre değiştirin'
        ],
        'problog' => [
            'label' => 'Radiantweb Problog için kullanım?',
            'comment' => 'Radientweb Problog eklentisinde gönderi editörü olarak Wysiwyg editörü kullan'
        ],
        'proevent' => [
            'label' => 'Radiantweb ProEvents için kullanım?',
            'comment' => 'Radiantweb ProEvents eklentisinde gönderi editörü olarak Wysiwyg editörü kullan'
        ],
        'spages' => [
            'label' => 'RainLab Static sayfalar için kullanım?',
            'comment' => 'RainLab Static sayfalar eklentisinde gönderi editörü olarak Wysiwyg editörü kullan'
        ],
        'blog' => [
            'label' => 'RainLab Blog için kullanım?',
            'comment' => 'RainLab Blog eklentisinde gönderi editörü olarak Wysiwyg editörü kullan'
        ],
        'apages' => [
            'label' => 'Autumn Sayfalar için kullanım?',
            'comment' => 'Autumn Sayfalar eklentisinde gönderi editörü olarak Wysiwyg editörü kullan'
        ],
        'tab' => [
            'settings' => 'Ayarlar',
            'content' => 'İçerik'
        ]
    ]
];
