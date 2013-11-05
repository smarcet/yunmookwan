<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/12/13
 * Time: 7:25 PM
 * To change this template use File | Settings | File Templates.
 */

class TrainingDay extends DataObject  {

    public static $db = array(
        'Day'=>"Enum('Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday', 'Sunday')",
        'StartTime' => 'Time',
        'EndTime' => 'Time'
    );

    static $summary_fields = array(
        'Day',
        'StartTime',
        'EndTime'
    );

    static $has_many = array(
        'TrainingClasses' => 'TrainingClass'
    );

    public static $casting = array(
        "Name" => 'Text',
    );

    public function getCMSFields() {
        $fields= new FieldList(
            $start = new TimeField('StartTime', _t('TrainingDay.StartTime', "Start Time")),
            $end = new TimeField('EndTime',_t('TrainingDay.EndTime', "End Time")),
            // Or if your object doesn't have a 'Title' field
            $dropDownField = new DropdownField(
                'Day',
                _t('TrainingDay.Day', "Day"),
                singleton('TrainingDay')->dbObject('Day')->enumValues()
            )
        );
        $start->setConfig('timeformat','HH:mm');
        $end->setConfig('timeformat','HH:mm');

        return $fields;
    }

    public function getName(){
        $day = _t('TrainingDay.'.$this->Day, $this->Day);
        return $day .' - '.$this->StartTime.' - '.$this->EndTime;
    }

    function fieldLabels($includerelations = true){
        $labels = parent::fieldLabels($includerelations);
        $labels['Day']   =  _t('TrainingDay.Day', "Day");
        $labels['StartTime']   =  _t('TrainingDay.StartTime', "Start Time");
        $labels['EndTime']   =  _t('TrainingDay.EndTime', "End Time");
        return $labels;
    }

    public function singular_name() {
        $res = _t('TrainingDay.SINGULARNAME', "Training Day");
        return $res;
    }

    public function plural_name() {
        return _t('TrainingDay.PLURALNAME', "Training Days");
    }
}