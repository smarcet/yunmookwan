<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/9/13
 * Time: 4:20 PM
 * To change this template use File | Settings | File Templates.
 */

class ContactEmail extends DataObject {

    // Contact object's fields
    public static $db = array(
        'Email' => 'Varchar(255)',
        'Message' => 'Text',
        'Name' => 'Varchar(255)'
    );

}