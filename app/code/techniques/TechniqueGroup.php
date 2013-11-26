<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 10/31/13
 * Time: 12:57 AM
 */

class TechniqueGroup  extends DataObject {

    public static $db = array(
        'Name' => 'Varchar(255)',
        'SubName' => 'Varchar(255)',
        'Description' => 'HTMLText'
    );

    function getCMSValidator()
    {
        return $this->getValidator();
    }

    function getValidator()
    {
        $validator= new RequiredFields(array('Name','SubName'));
        return $validator;
    }

    static $field_labels = array(
        'Name' => 'Nombre',
        'SubName' => 'Subtitulo',
        'Parent.Name' => 'Grupo',
    );

    static $summary_fields = array(
        'Name',
        'Parent.Name',
    );

    static $has_one = array(
        'Parent'=>'TechniqueGroup'
    );

    static $has_many = array(
        'Techniques' => 'Technique'
    );

    public function singular_name() {
        $res = _t('TechniqueGroup.SINGULARNAME', "Grupo de Tecnica");
        return $res;
    }

    public function plural_name() {
        return _t('TechniqueGroup.PLURALNAME', "Grupos de Tecnica");
    }

    public function getChildGroups(){
        $childs = TechniqueGroup::get()->filter(array("ParentID"=>$this->ID));
        return $childs;
    }

    public function getChildTechniques(){
        $childs = $this->Techniques();
        return $childs;
    }
} 