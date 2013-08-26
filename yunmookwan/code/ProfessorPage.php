<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/13/13
 * Time: 1:21 PM
 * To change this template use File | Settings | File Templates.
 */

class ProfessorPage extends Page {

}

class ProfessorPage_Controller extends Page_Controller{

    static $allowed_actions = array('placedata');

    public function getProfessors(){
        return Professor::get()->filter(array('ShowOnSite'=>'1'))->sort('Graduation', 'DESC');
    }

    public function init() {
        parent::init();
        Requirements::themedCSS('professor-page');
    }



    public function placedata($request){
        $places = TrainingPlace::get();
        $res = array();
        foreach($places as $place){
            $res[$place->ID]= array(
                'id'=>$place->ID,
                'name'=> htmlentities($place->Name),
                'address'=>$place->Address,
                'city'=>$place->City,
                'map'=>$place->GoogleMapQuery,
                'title' => htmlentities($place->Name.'-'.$place->FullAddress)
            );
        }
        return json_encode($res,JSON_HEX_APOS);
    }

}