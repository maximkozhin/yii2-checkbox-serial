<?php

namespace maximkozhin\checkboxserial\widgets;

use yii\base\InvalidParamException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;

class CheckboxSerial extends Widget
{
    /**
     * selector class for Main checkbox input
     * @var string
     */
    public $selectorClass = 'checkbox-serial';

    public $id = 'checkbox-serial-all';

    public $label = 'Выбрать все';

    public $options = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        if(!$this->selectorClass || !is_string($this->selectorClass)) {
            throw new InvalidParamException("Parameter 'selectorClass' must be a string");
        }

        if(!$this->id || !is_string($this->id)) {
            throw new InvalidParamException("Parameter 'id' must be a string");
        }

        $this->options['id'] = $this->id;
        $this->options['label'] = $this->label;
        $this->options['value'] = null;
        $this->view->registerJs(
            "var checkboxes = document.querySelectorAll('input.{$this->selectorClass}');
             var checkall = document.getElementById('{$this->id}');
             for(var i=0; i < checkboxes.length; i++) {
                 checkboxes[i].onclick = function() {
                     var checkedCount = document.querySelectorAll('input.{$this->selectorClass}:checked').length;             
                     checkall.checked = checkedCount > 0;
                     checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
                 }
             }             
             checkall.onclick = function() {
                 for(var i=0; i<checkboxes.length; i++) {
                     checkboxes[i].checked = this.checked;
                 }
             }", View::POS_END);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::checkbox(null, false, $this->options);
    }
}