<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 11/7/13
 * Time: 12:07 PM
 */

class TrainingClassVideo extends YouTubeVideo{

    static $has_one = array(
        'Parent'=>'TrainingClass'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","ParentID");
        return $fields;
    }
} 