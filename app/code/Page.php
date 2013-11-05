<?php

class Page extends SiteTree {

    private static $db = array(
    );

    private static $has_one = array(
    );

}

class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
    private static $allowed_actions = array (
    );

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates 
		// instead of putting Requirements calls here.  However these are 
		// included so that our older themes still work
		Requirements::themedCSS('reset');
		Requirements::themedCSS('bootstrap.min');
		Requirements::themedCSS('typography'); 
		Requirements::themedCSS('form');
        Requirements::themedCSS('layout');
        Requirements::themedCSS('magnific-popup');


        $theme_folder = SSViewer::get_theme_folder();

        Requirements::javascript(Director::protocol().'ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js');
        Requirements::javascript(Director::protocol().'code.jquery.com/jquery-migrate-1.2.1.min.js');
        Requirements::javascript("{$theme_folder}/javascript/shadowbox/shadowbox.js");
        Requirements::javascript("{$theme_folder}/javascript/jquery.magnific-popup.min.js");
        Requirements::javascript("{$theme_folder}/javascript/bootstrap.min.js");
        Requirements::javascript("{$theme_folder}/javascript/script.js");
        Requirements::javascript("{$theme_folder}/javascript/image.gallery.js");


        Requirements::customScript("
         Shadowbox.init();
         $(document).ready(function($) {
                $('.outbound-link').live('click',function(event){
                    var href = $(this).attr('href');
                    var text = $(this).text();
                    recordOutboundLink(this,'Outbound Links',href,text);
                    event.preventDefault();
                    event.stopPropagation()
                    return false;
                });

                $('.popup-gmaps').live('click',function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    var url = $(this).attr('map');
                    var title = $(this).attr('title');
                    Shadowbox.open({
                    content:    url,
                    player:     'iframe',
                    title:      title
                    });
                    return false;
                });
        });","init-scripts");
	}

    public function getGoogleVerificationCode(){
        global $GoogleVerificationCode;
        return $GoogleVerificationCode;
    }

    public function getGoogleAnalitycsAccount(){
        global $GoogleAnalitycsAccount;
        return $GoogleAnalitycsAccount;
    }

    public function getFacebookAppId(){
        global $FacebookAppId;
        return $FacebookAppId;
    }
}