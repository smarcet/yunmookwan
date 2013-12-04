<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 12/4/13
 * Time: 7:24 PM
 */

class ExamVideo extends YouTubeVideo{
    static $has_one = array(
        'Parent'=>'Exam'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","ParentID");
        return $fields;
    }
} 