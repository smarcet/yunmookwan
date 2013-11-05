<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/20/13
 * Time: 5:31 PM
 * To change this template use File | Settings | File Templates.
 */

class HomePage extends Page {

}

class HomePage_Controller  extends Page_Controller{

    public function getDirectorProfessor(){
        $res = Professor::get()->filter(array("Role"=>'Director'))->First();
        return $res;
    }

    public function getTechAdviserProfessor(){
        return Professor::get()->filter(array("Role"=>'TechAdviser'))->First();
    }

    public function getHeadquarter(){
        return TrainingPlace::get()->filter(array("Headquarter"=>1))->First();
    }

    public function getNews(){
        return News::get()->sort("Created",'DESC');
    }

    public function init() {
        parent::init();
        Requirements::themedCSS('home-page');
    }
}