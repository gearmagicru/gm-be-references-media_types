<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\References\MediaTypes\Widget;

/**
 * Виджет для формирования интерфейса окна редактирования записи.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\References\MediaTypes\Widget
 * @since 1.0
 */
class EditWindow extends \Gm\Panel\Widget\EditWindow
{
    /**
     * {@inheritdoc}
     */
    protected function init(): void
    {
        parent::init();

        // панель формы (Gm.view.form.Panel GmJS)
        $this->form->bodyPadding = 10;
        $this->form->defaults = [
            'xtype'      => 'textfield',
            'anchor'     => '100%',
            'labelAlign' => 'right',
            'labelWidth' => 90
        ];
        $this->form->router->route = $this->creator->route('/form');
        $this->form->loadJSONFile('/form', 'items');

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $this->resizable = false;
        $this->width = 480;
        $this->autoHeight = true;
        $this->layout = 'fit';
    }
}
