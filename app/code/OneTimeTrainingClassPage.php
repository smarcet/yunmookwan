<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/13/13
 * Time: 1:01 PM
 * To change this template use File | Settings | File Templates.
 */

class OneTimeTrainingClassPage extends Page {

}

class OneTimeTrainingClassPage_Controller extends Page_Controller{

    static $allowed_actions = array('instance');

    //render with OneTimeTrainingClassPage_Instance.ss
    function instance($request){
        $params = $request->allParams();
        $id = $params['ID'];
        $class = OneTimeTrainingClass::get()->byID($id);
        $data = array(
            'Result' =>$class,
            'Title' => 'Clase De Danes'
        );
        return $this->customise($data);
    }

    public function init() {
        parent::init();
        Requirements::themedCSS('photo-gallery');
        Requirements::themedCSS('onetime-trainning-class');
    }


    public function getClasses(){
        return OneTimeTrainingClass::get()->where(" OneTimeTrainingClass.ID NOT IN (SELECT S.ID FROM `Seminar` S) ")->sort('Date', 'DESC');
    }
}