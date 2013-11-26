<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/21/13
 * Time: 2:14 PM
 * To change this template use File | Settings | File Templates.
 */

class YouTubeVideo extends  DataObject {

    static $db = array(
        'VideoId' => 'Text',
        'SortOrder' => 'Int',
        'Title'=>'Text',
        'Description' => 'HTMLText',
    );

    static $has_one = array(
        'Thumbnail' => 'Image',
    );

    function getCMSValidator()
    {
        return $this->getValidator();
    }

    function getValidator()
    {
        $validator= new RequiredFields(array('VideoId','Title'));
        return $validator;
    }


    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldFromTab("Root.Main","SortOrder");
        return $fields;
    }

    public static $casting = array(
        "BareTitle" => 'Text',
    );


    // Tell the datagrid what fields to show in the table
    public static $summary_fields = array(
        'BareTitle' => 'Title',
        'ThumbnailPic' => 'Thumbnail'
    );

    // this function creates the thumnail for the summary fields to use
    public function getThumbnailPic() {
        $img = $this->Thumbnail();
        if($img->exists()){
            return $img->CMSThumbnail();
        }
        return DBField::create_field('HTMLVarchar', '<img height="100" width="130" alt="pic" src="http://img.youtube.com/vi/'.$this->VideoId.'/hqdefault.jpg"/>');
    }

    public function getBareTitle(){
        return strip_tags($this->Title);
    }

    public function getFileName(){
        $img = $this->Thumbnail();
        if($img->exists()){
            return $img->Filename;
        }
        return 'n/a';
    }

    public function getSmallPreview(){
        $img = $this->Thumbnail();
        if($img->exists()){
            return $img->SetRatioSize('150','75');
        }
        return '<img alt="pic" src="http://img.youtube.com/vi/'.$this->VideoId.'/hqdefault.jpg"/>';
    }

    public function getPreview(){
        $img = $this->Thumbnail();
        if($img->exists()){
            return $img->SetRatioSize('300','169');
        }
        return '<img src="http://img.youtube.com/vi/'.$this->VideoId.'/hqdefault.jpg"/>';
    }

    public function ShortTitle(){
        $raw = strip_tags($this->Title);
        return strlen($raw)>50?substr($raw,0,50).'...':$raw;
    }

}