<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/21/13
 * Time: 2:07 PM
 * To change this template use File | Settings | File Templates.
 */

class Seminar extends  OneTimeTrainingClass {

    public static $db = array(
        'Title' => 'Text',
        'Text' => 'HTMLText',
        'To'=>'Date'
    );

    function getCMSValidator()
    {
        return $this->getValidator();
    }

    function getValidator()
    {
        $validator= new RequiredFields(array('Title','Text','To','Date'));
        return $validator;
    }


    // One-to-one relationship with gallery page
    public static $has_one = array(
        'Flier' => 'BetterImage',
    );



    public static $casting = array(
        "WhenFull" => 'Text',
    );


    static $summary_fields = array(
        'Title',
        'WhenFull',
        'Where.Name',
        'Professor.FullName'
    );

    static $field_labels = array(
        'Title'=>'Nombre',
        'WhenFull' => 'Cuando',
        'Professor.FullName' => 'A Cargo',
    );

    public function getWhenFull(){
        return $this->Date.' Hasta '.$this->To;
    }

    public function getSortedVideos(){
        return $this->Videos()->sort("SortOrder");
    }

    public function getCMSFields() {


        $fields= new FieldList(
            new TextField("Title","Titulo"),
            new HtmlEditorField("Text","Texto"),
            new UploadField("Flier","Panfleto"),
            new DropdownField(
                'ProfessorID',
                'Profesor',
                Professor::get()->map('ID', 'FullName')
            ),
            new DropdownField(
                'WhereID',
                'Donde',
                TrainingPlace::get()->map('ID', 'Name')
            )

        );
        $date = DateField::create('Date','From')->setConfig('showcalendar', true);
        $fields->add($date);

        $to = DateField::create('To','To')->setConfig('showcalendar', true);
        $fields->add($to);

        $fields->add(new CheckboxField("ShowFBComments",'Activar Comentarios'));

        if($this->ID>0){
            $gridFieldConfigImages = GridFieldConfig_RecordEditor::create();
            $gridFieldConfigImages->addComponent(new GridFieldSortableRows('SortOrder'));
            $images = new GridField("Images", "Galeria de Imagenes", $this->Images()->sort("SortOrder"), $gridFieldConfigImages);
            $fields->add($images);

            $gridFieldConfigVideos = GridFieldConfig_RecordEditor::create();
            $gridFieldConfigVideos->addComponent(new GridFieldSortableRows('SortOrder'));
            $videos = new GridField("Videos", "Galeria de Videos", $this->Videos()->sort("SortOrder"), $gridFieldConfigVideos);
            $fields->add($videos);
        }

        return $fields;
    }

    public function singular_name() {
        $res = _t('Seminar.SINGULARNAME', "Seminar");
        return $res;
    }

    public function plural_name() {
        return _t('Seminar.PLURALNAME', "Seminars");
    }

    public function getSeminarPics(){
        $res= $this->Images()->sort("SortOrder");
        return $res;
    }

    public function getShortText(){
        $raw = strip_tags($this->Text);
        return strlen($raw)>150?substr($raw,0,150).'...':$raw;
    }

    public function getRawText(){
        $raw = strip_tags($this->Text);
        return $raw;
    }
}