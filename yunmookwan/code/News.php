<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/20/13
 * Time: 6:59 PM
 * To change this template use File | Settings | File Templates.
 */

class News extends DataObject{
    public static $db = array(
        'Text' => 'HTMLText',
    );

    static $summary_fields = array(
        'Text',
    );
}