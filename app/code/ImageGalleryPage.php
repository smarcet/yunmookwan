<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 10/23/13
 * Time: 9:15 PM
 */

class ImageGalleryPage extends Page {

    public static $db = array(
        'ShowFBComments'=>'Boolean',
    );

    static $has_many = array(
        'Images' => 'ImageGalleryPageImage',
        'Videos' => 'YouTubeVideo',
    );


    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->add(new CheckboxField("ShowFBComments",'Activar Comentarios'));

        $gridFieldConfig = GridFieldConfig_RecordEditor::create();
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $gridFieldConfig->addComponent(new GridFieldBulkImageUpload());
        $gridField = new GridField("Images", "Galeria de Imagenes", $this->Images()->sort("SortOrder"), $gridFieldConfig);
        $fields->add($gridField);

        $gridFieldConfigVideos = GridFieldConfig_RecordEditor::create();
        $gridFieldConfigVideos->addComponent(new GridFieldSortableRows('SortOrder'));
        $videos = new GridField("Videos", "Galeria de Videos", $this->Videos()->sort("SortOrder"), $gridFieldConfigVideos);
        $fields->add($videos);

        return $fields;
    }
}

class ImageGalleryPage_Controller extends Page_Controller{
    public function init() {
        parent::init();
        Requirements::themedCSS('photo-gallery');
        Requirements::themedCSS('video-gallery');
        Requirements::themedCSS('gallery-page');
    }

    public function getSortedVideos(){
        return Director::get_current_page()->Videos()->sort("SortOrder");
    }
}