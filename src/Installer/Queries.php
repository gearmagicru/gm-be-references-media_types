<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Файл конфигурации Карты SQL-запросов.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

/** @var bool $isSetup Если установщик приложения  */
$isSetup = $this->getParam('isSetup', false);
/** @var bool $isRu Если язык установки русский */
$isRu = $this->getParam('isRu', false);
/** @var int|null $userId */
$userId = $isSetup ? 1 : Gm::userIdentity()->getId();
/** @var string $date */
$date = gmdate('Y-m-d H:i:s');
/** @var string $baseUrl */
$baseUrl = MODULE_BASE_URL . '/gm/gm.be.references.media_types/assets/images/types';

return [
    'drop'   => ['{{reference_media_types}}'],
    'create' => [
        '{{reference_media_types}}' => function () {
            return "CREATE TABLE `{{reference_media_types}}` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) DEFAULT NULL,
                `type` varchar(50) DEFAULT NULL,
                `icon` varchar(255) DEFAULT NULL,
                `_updated_date` datetime DEFAULT NULL,
                `_updated_user` int(11) unsigned DEFAULT NULL,
                `_created_date` datetime DEFAULT NULL,
                `_created_user` int(11) unsigned DEFAULT NULL,
                `_lock` tinyint(1) unsigned DEFAULT 0,
                PRIMARY KEY (`id`)
            ) ENGINE={engine} 
            DEFAULT CHARSET={charset} COLLATE {collate}";
        }
    ],

    'insert' => [
        '{{reference_media_types}}' => [
            [
                'id'   => 1,
                'name' => $isRu ? 'Файл' : 'File',
                'type' => 'file',
                'icon' => $baseUrl . '/file.svg' ,
                '_created_date' => $date,
                '_created_user' => $userId

            ],
            [
                'id'   => 2,
                'name' => $isRu ? 'Изображение' : 'Image',
                'type' => 'image',
                'icon' => $baseUrl . '/image.svg' ,
                '_created_date' => $date,
                '_created_user' => $userId
            ],
            [
                'id'   => 3,
                'name' => $isRu ? 'Видео' : 'Video',
                'type' => 'video',
                'icon' => $baseUrl . '/video.svg' ,
                '_created_date' => $date,
                '_created_user' => $userId
            ],
            [
                'id'   => 4,
                'name' => $isRu ? 'Аудио' : 'Audio',
                'type' => 'audio',
                'icon' => $baseUrl . '/audio.svg' ,
                '_created_date' => $date,
                '_created_user' => $userId
            ],
            [
                'id'   => 5,
                'name' => $isRu ? 'Документ' : 'Document',
                'type' => 'document',
                'icon' => $baseUrl . '/document.svg' ,
                '_created_date' => $date,
                '_created_user' => $userId
            ],
            [
                'id'   => 6,
                'name' => $isRu ? 'Архив' : 'Archive',
                'type' => 'archive',
                'icon' => $baseUrl . '/archive.svg' ,
                '_created_date' => $date,
                '_created_user' => $userId
            ]
        ]
    ],

    'run' => [
        'install'   => ['drop', 'create', 'insert'],
        'uninstall' => ['drop']
    ]
];