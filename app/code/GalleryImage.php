<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/20/13
 * Time: 12:31 AM
 * To change this template use File | Settings | File Templates.
 */

class GalleryImage extends DataObject {

    public static $db = array(
        'SortOrder' => 'Int',
        'Title' => 'Varchar'
    );

    // One-to-one relationship with gallery page
    public static $has_one = array(
        'Image' => 'BetterImage',
        'Parent'=>'OneTimeTrainingClass'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","SortOrder");
        $fields->removeFieldFromTab("Root.Main","ParentID");
        return $fields;
    }

    // Tell the datagrid what fields to show in the table
    public static $summary_fields = array(
        'Title' => 'Title',
        'Thumbnail' => 'Thumbnail'
    );

    // this function creates the thumnail for the summary fields to use
    public function getThumbnail() {
        return $this->Image()->CMSThumbnail();
    }

    public function Pic(){
        $img = $this->Image();
        $theme = SSViewer::current_theme();
        if(isset($img) && Director::fileExists($img->Filename) && $img->exists()){
            //$img= $img->SetRatioSize(300,250);
            return "<img alt='{$this->Title}_pic' src='/themes/{$theme}/images/loading_image_placeholder.gif'  data-url='{$img->getURL()}' class='pic' title='{$this->Title}'/>";
        }
    }

    public function BootstrapPic(){
        $img = $this->Image();
        $theme = SSViewer::current_theme();
        if(isset($img) && Director::fileExists($img->Filename) && $img->exists()){
            //$img= $img->SetRatioSize(300,250);
            return "<img alt='{$this->Title}_pic' src='{$img->getURL()}'  data-url='{$img->getURL()}' class='img-polaroid' title='{$this->Title}' />";
        }
    }
}