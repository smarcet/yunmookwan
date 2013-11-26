<?php
class ContactPage extends Page{
	static $db = array(
			'Mailto'     => 'Varchar(100)',
			'SubmitText' => 'Text',
            'Subject'    =>'Text'
	);
	 
	function getCMSFields() {
		$fields = parent::getCMSFields();
		 
		$fields->addFieldToTab("Root.Configuracion", new EmailField('Mailto', 'Correo de Contacto'));
		$fields->addFieldToTab("Root.Configuracion", new TextareaField('SubmitText', 'Texto a mostrar al enviar'));
        $fields->addFieldToTab("Root.Configuracion", new TextareaField('Subject', 'Asunto'));
		 
		return $fields;
	}
	
}


class ContactPage_Controller extends Page_Controller {

    static $allowed_actions = array('ContactForm');
    
    public function ContactForm() { 
        $fields = new FieldList( 
            new TextField('Name','Nombre'), 
            new EmailField('Email','Correo Electronico'), 
            new TextareaField('Message','Mensaje')
        ); 
        // Create Validators
        $validator = new RequiredFields('Name', 'Email', 'Message');
        //create the submit action
        $actions = new FieldList( 
            new FormAction('SendContactForm', 'Enviar') 
        ); 
        $form = new Form($this, 'ContactForm', $fields, $actions,$validator);
        $protector = SpamProtectorManager::update_form($form, 'Message');
        return $form;
    }
    
    
    public function SendContactForm($data, $form) {
	    //	Set data
	    
    	$data['Email'] = filter_var($data['Email'], FILTER_SANITIZE_EMAIL);
    	$data['Message'] = filter_var($data['Message'], FILTER_SANITIZE_SPECIAL_CHARS);
    	$data['Name'] = filter_var($data['Name'], FILTER_SANITIZE_SPECIAL_CHARS);

        $new_contact = new ContactEmail();
        $new_contact->Email    = $data['Email'] ;
        $new_contact->Message  = $data['Message'] ;
        $new_contact->Name     = $data['Name'] ;
        $new_contact->write();
    	
        $From = $data['Email'];
        
        if(!filter_var($From, FILTER_VALIDATE_EMAIL)){
        	$errorPage = DataObject::get_one('ErrorPage');
        	Director::redirect($errorPage->Link(),404);
        	return;
        }
        
        $To      = $this->Mailto;
        $Subject = $this->Subject;
        $email   = new Email($From, $To, $Subject);
        $email->replyTo($From);
        //set template
        $email->setTemplate('ContactEmail');
        //populate template$body
        $email->populateTemplate($data);
        //send mail
        $email->send();
        //return to submitted message
        $this->redirect($this->Link("?success=1"));
    }
    
    public function Success()
    {
    	return isset($_REQUEST['success']) && $_REQUEST['success'] == "1";
    }
    
}