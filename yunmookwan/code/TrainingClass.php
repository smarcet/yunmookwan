<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/9/13
 * Time: 5:14 PM
 * To change this template use File | Settings | File Templates.
 */

class TrainingClass extends DataObject {

    public static $db = array(
        'Audience'=>"Enum('Adult, Child', 'Adult')"
    );

    static $has_one = array(
        'Where' => 'TrainingPlace',
        'When' => 'TrainingDay',
        'Professor'=>'Professor',
    );

    static $defaults = array('Audience' => 'Adult');

    public function getCMSFields() {
        $fields= new FieldList(
            new DropdownField(
                'ProfessorID',
                'Profesor',
                Professor::get()->map('ID', 'FullName')
            ),
            new DropdownField(
                'WhereID',
                'Donde',
                TrainingPlace::get()->map('ID', 'Name')
            ),
            new DropdownField(
                'WhenID',
                'Cuando',
                TrainingDay::get()->map('ID', 'Name')
            ),
            new DropdownField(
                'Audience',
                'Audiencia',
                singleton('TrainingClass')->dbObject('Audience')->enumValues()
            )
        );
        return $fields;
    }

    static $summary_fields = array(
        'When.Name',
        'Where.Name',
        'Professor.FullName'
    );

    function fieldLabels($includerelations = true){
        $labels = parent::fieldLabels($includerelations);
        $labels['When.Name']   =  _t('TrainingClass.When.Name', "When");
        $labels['Where.Name']   =  _t('TrainingClass.Where.Name', "Where");
        $labels['Professor.FullName']   =  _t('TrainingClass.Professor.FullName', "Professor");
        return $labels;
    }

    public function singular_name() {
        $res = _t('TrainingClass.SINGULARNAME', "Training Class");
        return $res;
    }

    public function plural_name() {
        return _t('TrainingClass.PLURALNAME', "Training Classes");
    }

    public function Audiencei18n(){
        return _t('TrainingClass.'.$this->Audience, "Audience");
    }

    public function getWhereID(){
        $where = $this->Where();
        return isset($where)?$where->ID:-1;
    }

    public function getDay(){
        $day = $this->When()->Day;
        $time = explode(":", $this->When()->StartTime);
        $hour = $time[0];
        $min = $time[1];
        /*
         * 'Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday
         */
        $start='';
        switch($day){
            case 'Sunday':
                $start='1';
                break;
            case 'Monday':
                $start='2';
                break;
            case 'Tuesday':
                $start='3';
                break;
            case 'Wednesday':
                $start='4';
                break;
            case 'Thursday':
                $start='5';
                break;
            case 'Friday':
                $start='6';
                break;
            case 'Saturday':
                $start='7';
                break;
        }
        $start = $start.str_pad($hour, 2, "0", STR_PAD_LEFT).str_pad($min, 2, "0", STR_PAD_LEFT);

        return intval($start);
    }
}