<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/12/13
 * Time: 7:31 PM
 * To change this template use File | Settings | File Templates.
 */

class ProfessorAdmin extends ModelAdmin  {
    public static $managed_models = array('Professor'); // Can manage multiple models
    static $url_segment = 'professors'; // Linked as /admin/professors/
    static $menu_title = 'Administracion Profesores';

}