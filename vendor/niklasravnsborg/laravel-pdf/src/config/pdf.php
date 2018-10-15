<?php

return [
    'font_data' => [
        "xbriyaz" => [
            'R' => "XB Riyaz.ttf",
            'B' => "XB RiyazBd.ttf",
            'I' => "XB RiyazIt.ttf",
            'BI' => "XB RiyazBdIt.ttf",
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
    ],
    "font_path"            =>__DIR__ . '/../../ttfonts/',
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/')
];
