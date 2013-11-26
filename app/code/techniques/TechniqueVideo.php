<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 11/7/13
 * Time: 12:09 PM
 */

class TechniqueVideo extends YouTubeVideo {

    static $has_one = array(
        'Parent'=>'Technique'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","ParentID");
        return $fields;
    }
} 