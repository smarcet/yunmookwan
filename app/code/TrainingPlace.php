<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/9/13
 * Time: 5:19 PM
 * To change this template use File | Settings | File Templates.
 */

class TrainingPlace extends DataObject {

    public static $db = array(
        'Name'=>'Text',
        'Address' => 'Text',
        'City'=>'Text',
        'Country'=>'Text',
        'Headquarter'=>'Boolean'
    );

    static $defaults = array('Headquarter' => 0,'Country'=>'Argentina');

    static $summary_fields = array(
        'Name'
    );

    public static $casting = array(
        "FullAddress" => 'Text',
        'GoogleMapQuery'=> 'Text',
    );

    public function getFullAddress(){
        return $this->Address.' - '.$this->City.' - '.$this->Country;
    }

    public function getGoogleMapQuery(){
        return $this->Address.' , '.$this->City.' , '.$this->Country;
    }

    public function getCMSValidator() {
        return new RequiredFields('Name', 'Address', 'City');
    }

    function fieldLabels($includerelations = true){
        $labels = parent::fieldLabels($includerelations);
        $labels['Name']   =  _t('TrainingPlace.Name', "Name");
        $labels['Address']   =  _t('TrainingPlace.Address', "Address");
        $labels['City']   =  _t('TrainingPlace.City', "City");
        return $labels;
    }

    public function singular_name() {
        $res = _t('TrainingPlace.SINGULARNAME', "Training Place");
        return $res;
    }

    public function plural_name() {
        return _t('TrainingPlace.PLURALNAME', "Training Places");
    }
}