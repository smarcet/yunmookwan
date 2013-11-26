<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/9/13
 * Time: 6:55 PM
 * To change this template use File | Settings | File Templates.
 */

class Professor extends DataObject{

    public static $db = array(
        'Name' => 'Varchar(255)',
        'MiddleName' => 'Varchar(255)',
        'Surname' => 'Varchar(255)',
        'Graduation' => 'Int',
        'BioInfo'=>'HTMLText',
        'Email'=>'Varchar(255)',
        'FBUrl'=>'Varchar(255)',
        'ShowOnSite' => 'Boolean',
        'Role'=>"Enum('Director, TechAdviser, Instructor', 'Instructor')",
    );

    function getCMSValidator()
    {
        return $this->getValidator();
    }

    function getValidator()
    {
        $validator= new RequiredFields(array('Name','Surname','Graduation','Role'));
        return $validator;
    }


    public static $searchable_fields = array(
        'Name'
    );

    static $defaults = array('ShowOnSite' => 1,'Role'=>'Instructor');

    static $summary_fields = array(
        'Name',
        'Surname',
        'Graduation',
        'ThumbnailPic'
    );

    static $field_labels = array(
        'Name' => 'Nombre',
        'Surname' => 'Apellido',
        'Graduation' => 'Graduacion',
    );

    static $has_one = array(
        'Photo'=>'BetterImage'
    );

    static $has_many = array(
        'TrainingClasses' => 'TrainingClass'
    );

    public function getFullName(){
        return $this->Name.' '.$this->MiddleName.' '.$this->Surname;
    }

    public function getTitle(){
        return $this->getFullName();
    }

    public static $casting = array(
        "FullName" => 'Text',
        'ProfilePhotoUrl'=>'Text',
        "Photo" => 'Text',
    );

    public function getThumbnailPic(){
        $img = $this->Photo();
        if($img->exists()){
            return $img->CMSThumbnail();
        }
        return 'N/A';
    }

    public function getProfilePhotoUrl(){
        $img = $this->Photo();
        if(isset($img) && Director::fileExists($img->Filename) && $img->exists()){
            return $img->getURL();
        }
        return '';
    }


    public function getCMSFields() {
        $fields= parent::getCMSFields();
        //$gridFieldConfig = GridFieldConfig_RelationEditor::create()->addComponents(new GridFieldDeleteAction('unlinkrelation'));
        //$gridField = new GridField("TrainingDays", "TrainingDays", $this->TrainingDays(), $gridFieldConfig);
        //$fields->add($gridField);
        return $fields;
    }

    public function ProfilePhoto($width='300',$height='250'){
        $img = $this->Photo();
        if(isset($img) && Director::fileExists($img->Filename) && $img->exists()){
            $img= $img->SetRatioSize($width,$height);
            return "<img alt='{$this->Name}_big_logo' src='{$img->getURL()}' class='big-logo-profile'/>";
        }
        else{
            $theme = SSViewer::current_theme();
            return "<img alt='{$this->Name}_big_logo' src='themes/{$theme}/images/generic-profile-photo.png' class='generic-logo-profile'/>";
        }
    }

    public function getGroupedTrainingClasses() {
        $res =  GroupedList::create(
            $this->TrainingClasses()
            ->innerJoin('TrainingPlace',"TrainingPlace.ID=TrainingClass.WhereID")
            ->Where(" TrainingClass.ID NOT IN (SELECT S.ID FROM `Seminar` S) AND TrainingClass.ID NOT IN (SELECT O.ID FROM `OneTimeTrainingClass` O) ")
            ->sort('TrainingPlace.ID'));
        return $res;
    }

    public function CurrentRole(){
        return _t('Professor.'.$this->Role, $this->Role);
    }


}