<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/21/13
 * Time: 2:18 PM
 * To change this template use File | Settings | File Templates.
 */

class SeminarAdmin  extends ModelAdmin  {
    public static $managed_models = array('Seminar');
    static $url_segment = 'seminars';
    static $menu_title = 'Administracion Seminarios';
}