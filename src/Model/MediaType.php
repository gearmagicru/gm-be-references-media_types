<?php
/**
 * Этот файл является частью модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\MediaTypes\Model;

use Gm;
use Gm\Db\ActiveRecord;

/**
 * Активная запись типа медиаданных.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package  Gm\Backend\References\MediaTypes\Model
 * @since 1.0
 */
class MediaType extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * {@inheritdoc}
     */
    public function tableName(): string
    {
        return '{{reference_media_types}}';
    }

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'id'   => 'id',
            'type' => 'type',
            'name' => 'name',
            'icon' => 'icon'
        ];
    }

    /**
     * Возвращает запись по указанному значению первичного ключа.
     * 
     * @see ActiveRecord::selectByPk()
     * 
     * @param mixed $id Идентификатор записи.
     * 
     * @return MediaType|null Активная запись при успешном запросе, иначе `null`.
     */
    public function get(mixed $identifier): ?MediaType
    {
        return $this->selectByPk($identifier);
    }
}
