<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/13/13
 * Time: 11:13 AM
 * To change this template use File | Settings | File Templates.
 */

class OneTimeTrainingClass extends TrainingClass{

    public static $db = array(
        'Active' => 'Boolean',
        'ShowFBComments'=>'Boolean',
        'Date'=>'Date'
    );

    static $defaults = array('ShowFBComments' => 0);

    static $summary_fields = array(
        'Date',
        'Where.Name',
        'Professor.FullName'
    );

    static $has_many = array(
        'Images' => 'GalleryImage'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $date = DateField::create('Date','Date')->setConfig('showcalendar', true);
        $fields->add($date);
        $fields->add(new CheckboxField("ShowFBComments",'Activar Comentarios'));
        $gridFieldConfig = GridFieldConfig_RecordEditor::create();
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $gridField = new GridField("Images", "Galeria de Imagenes", $this->Images()->sort("SortOrder"), $gridFieldConfig);
        $fields->add($gridField);
        return $fields;
    }

    public function singular_name() {
        $res = _t('OneTimeTrainingClass.SINGULARNAME', "OneTime Training Class");
        return $res;
    }

    public function plural_name() {
        return _t('OneTimeTrainingClass.PLURALNAME', "OneTime Training Classes");
    }

    public function Void(){
        return  $this->Date <= date('Y-m-d');
    }

    public function Photos(){
        return $this->Images()->sort("SortOrder ASC");
    }
}