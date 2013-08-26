<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/21/13
 * Time: 2:07 PM
 * To change this template use File | Settings | File Templates.
 */

class SeminarsPage extends Page{

}

class SeminarsPage_Controller  extends Page_Controller{

    static $allowed_actions = array('seminar');

    public function seminar($request){
        $params = $request->allParams();
        $id = $params['ID'];
        $seminar = Seminar::get()->byID($id);
        $data = array(
            'Result' =>$seminar,
            'Title' => $seminar->Title
        );
        return $this->customise($data);
    }

    public function getSeminars(){
        $res =  Seminar::get()->sort('Date','DESC');
        return $res;
    }

    public function init() {
        parent::init();
        Requirements::themedCSS('photo-gallery');
        Requirements::themedCSS('seminars-page');
    }
}