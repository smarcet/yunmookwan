<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 11/6/13
 * Time: 12:07 AM
 */

class Exam extends OneTimeTrainingClass {

    public static $db = array(
        'Title' => 'Text',
        'From'=>'Time',
        'To'=>'Time',
    );

    function getCMSValidator()
    {
        return $this->getValidator();
    }

    function getValidator()
    {
        $validator= new RequiredFields(array('WhereID','ProfessorID','ActivityID','Title','Date','From','To'));
        return $validator;
    }

    static $has_many = array(
        'Videos' => 'ExamVideo',
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeByName('WhenID');
        $fields->removeByName('Audience');

        $title = new TextField("Title",'Nombre');
        $fields->insertBefore($title,'ProfessorID');

        $start = new TimeField('From', _t('TrainingDay.StartTime', "Start Time"));
        $fields->insertAfter($start,'Date');

        $end = new TimeField('To',_t('TrainingDay.EndTime', "End Time"));
        $fields->insertAfter($end,'From');

        if($this->ID>0){
            $gridFieldConfigVideos = GridFieldConfig_RecordEditor::create();
            $gridFieldConfigVideos->addComponent(new GridFieldSortableRows('SortOrder'));
            $videos = new GridField("Videos", "Galeria de Videos", $this->Videos()->sort("SortOrder"), $gridFieldConfigVideos);
            $fields->add($videos);
        }

        return $fields;
    }

    public function singular_name() {
        $res = _t('Exam.SINGULARNAME', "Examen");
        return $res;
    }

    public function plural_name() {
        return _t('Exam.PLURALNAME', "Examenes");
    }
} 