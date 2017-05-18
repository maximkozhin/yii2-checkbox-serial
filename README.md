Yii2 simple Widget for checkbox inputs 
======================================

Via composer
------------

add to your 'require' section in file 'composer.json'
```
 "require": {
       ...
        "maximkozhin/yii2-checkbox-serial": "*"
    },
```
or run command

```
$ composer require maximkozhin/yii2-checkbox-serial
```

**1. Usage | Использование**
-----------------------------------

To create a Main checkbox
```
<?= \maximkozhin\checkboxserial\widgets\CheckboxSerial::widget([
    /**
     * Generating HTML code: 
     * <input type="checkbox" ... class="selector-class-for-main-checbox-input" id="id-for-main-checbox-input"
     */
    'id' => 'id-for-main-checbox-input',
    'selectorClass'=>'selector-class-for-main-checbox-input',
    
    /** 
     * Generating HTML code: 
     * <laber for="id-for-main-checbox-input">{{$label}}</label> 
     */
    'label'=>false  //or 'label'=>'Выбрать Все' or 'label'=>'Check All'
])?>
```

After Main Checbox you can add another chekboxes:
```
<?=Html::input('checkbox', 'id[]', $value, ['class'=>'selector-class-for-main-checbox-input'])?>
```