<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 11/7/13
 * Time: 12:05 PM
 */

class TechniqueImage extends GalleryImage{
    // One-to-one relationship with gallery page
    public static $has_one = array(
        'Parent'=>'Technique',
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","ParentID");
        return $fields;
    }
} 