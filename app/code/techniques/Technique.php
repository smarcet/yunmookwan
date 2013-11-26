<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 10/31/13
 * Time: 12:57 AM
 */

class Technique extends DataObject {

    public static $db = array(
        'Name'        => 'Varchar(255)',
        'SubName'     => 'Varchar(255)',
        'Description' => 'HTMLText',
        'Slug'        => 'Text'
    );

    function getCMSValidator()
    {
        return $this->getValidator();
    }

    function getValidator()
    {
        $validator= new RequiredFields(array('Name','SubName','GroupID'));
        return $validator;
    }


    static $has_one = array(
        'Group'=>'TechniqueGroup'
    );

    static $has_many = array(
        'Videos' => 'TechniqueVideo',
        'Photos' =>'TechniqueImage',
    );

    static $field_labels = array(
        'Name' => 'Nombre',
        'SubName' => 'Subtitulo',
        'Group.Name' => 'Grupo',
        'GroupID' => 'Grupo',
    );

    static $summary_fields = array(
        'Name',
        'Group.Name',
    );

    public function getFirstVideo(){
        return $this->Videos()->first();
    }

    public function getFirstPic(){
        return $this->Photos()->first();
    }

    public function singular_name() {
        $res = _t('Technique.SINGULARNAME', "Tecnica");
        return $res;
    }

    public function plural_name() {
        return _t('Technique.PLURALNAME', "Tecnicas");
    }

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeByName("Slug");
        $fields->removeByName("Videos");
        $fields->removeByName("Photos");

        if($this->ID>0){
            $gridFieldConfig = GridFieldConfig_RelationEditor::create();
            $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
            $gridFieldConfig->addComponent(new GridFieldBulkImageUpload());
            $gridField = new GridField("Photos", "Galeria de Imagenes", $this->Photos()->sort("SortOrder"), $gridFieldConfig);
            $fields->add($gridField);

            $gridFieldConfigVideos = GridFieldConfig_RelationEditor::create();
            $gridFieldConfigVideos->addComponent(new GridFieldSortableRows('SortOrder'));
            $videos = new GridField("Videos", "Galeria de Videos", $this->Videos()->sort("SortOrder"), $gridFieldConfigVideos);
            $fields->add($videos);
        }
        return $fields;
    }


    function onBeforeWrite() {
        $name = $this->Name;
        $slug = UrlUtils::slugify($name);
        $this->Slug = $slug;
        parent::onBeforeWrite();
    }
} 