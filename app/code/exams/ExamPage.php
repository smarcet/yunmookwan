<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 11/6/13
 * Time: 12:16 AM
 */

class ExamsPage extends Page{

}

class ExamsPage_Controller extends  Page_Controller {


    static private $allowed_actions = array('exam');

    public function exam($request){
        $params = $request->allParams();
        $id = $params['ID'];
        $exam = Exam::get()->byID($id);
        $data = array(
            'Result' =>$exam,
            'Title' => $exam->Name
        );
        return $this->customise($data);
    }

    public function init() {
        parent::init();
        Requirements::themedCSS('photo-gallery');
        Requirements::themedCSS('video-gallery');
        Requirements::themedCSS('exam');
    }

    public function getExams(){
        $exams = Exam::get();
        return $exams;
    }
}