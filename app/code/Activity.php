<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 10/31/13
 * Time: 12:56 AM
 */

class Activity extends DataObject {
    public static $db = array(
        'Name' => 'Varchar(255)',
        'Description' => 'HTMLText'
    );

    function getCMSValidator()
    {
        return $this->getValidator();
    }

    function getValidator()
    {
        $validator= new RequiredFields(array('Name'));
        return $validator;
    }

    static $has_many = array(
        'TrainingClasses' => 'TrainingClass'
    );

    public function singular_name() {
        $res = _t('Activity.SINGULARNAME', "Actividad");
        return $res;
    }

    public function plural_name() {
        return _t('Activity.PLURALNAME', "Actividades");
    }
} 