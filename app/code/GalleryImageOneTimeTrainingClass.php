<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 11/7/13
 * Time: 11:39 AM
 */

class GalleryImageOneTimeTrainingClass extends GalleryImage {
    // One-to-one relationship with gallery page
    public static $has_one = array(
       'Parent'=>'OneTimeTrainingClass',
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","ParentID");
        return $fields;
    }
} 