<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/9/13
 * Time: 5:45 PM
 * To change this template use File | Settings | File Templates.
 */

class TrainingAdmin  extends ModelAdmin  {
    public static $managed_models = array('TrainingDay','TrainingPlace','TrainingClass','OneTimeTrainingClass','News');
    static $url_segment = 'training';
    static $menu_title = 'Administracion Practica';
}