<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 10/31/13
 * Time: 1:50 AM
 */

class TechniqueHolderPage extends Page{

}

class TechniqueHolderPage_Controller extends Page_Controller {


    static private $allowed_actions = array('technique');

    public function technique($request){
        $params = $request->allParams();
        $slug = $params['ID'];
        $technique = Technique::get()->filter(array('Slug' => $slug))->First();
        if($technique){
            $data = array(
                'Result' =>$technique,
                'Title' => $technique->Name
            );
            return $this->customise($data);
        }
        return $this->customise(array());
    }

    public function init() {
        parent::init();
        Requirements::themedCSS('photo-gallery');
        Requirements::themedCSS('video-gallery');
    }

    public function getTechniques(){
        $groups = TechniqueGroup::get()->filter(array('ParentID'=>'0'));
        return $groups;
    }

    public function getTechniqueUrl(){
        $link = $this->Link;
        $link .= "/tecnicas/technique";
        return $link;
    }
}