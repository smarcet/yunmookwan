<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/26/13
 * Time: 4:38 PM
 * To change this template use File | Settings | File Templates.
 */

class CustomSiteConfig  extends DataExtension{
    public static $db = array(
        'GoogleVerificationCode' =>'Text',
        'GoogleAnalitycsAccount' =>'Text',
        'FacebookAppId' =>'Text',
        'FacebookUserId' =>'Text',
        'GlobalDomain' =>'Text',
    );

    public function updateCMSFields(FieldList $fields){
        $fields->addFieldToTab("Root.Main",new TextField("GoogleVerificationCode","Google Verification Code"));
        $fields->addFieldToTab("Root.Main",new TextField("GoogleAnalitycsAccount","Google Analitycs Account"));
        $fields->addFieldToTab("Root.Main",new TextField("FacebookAppId","Facebook Appplication Id"));
        $fields->addFieldToTab("Root.Main",new TextField("FacebookUserId","Facebook User Id"));
        $fields->addFieldToTab("Root.Main",new TextField("GlobalDomain","Main Url"));
    }

    public static $casting = array(
        "CurrentUrl" => 'Text',
    );

    public function getCurrentUrl(){
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"])  && $_SERVER["HTTPS"]== "on" ) {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
}
