<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 10/31/13
 * Time: 1:47 AM
 */

class TechniqueAdmin extends ModelAdmin  {
    public static $managed_models = array('TechniqueGroup','Technique');
    static $url_segment = 'techniques';
    static $menu_title = 'Tecnicas';
}