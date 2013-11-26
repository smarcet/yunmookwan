<?php
/**
 * Created by PhpStorm.
 * User: smarcet
 * Date: 11/6/13
 * Time: 1:22 AM
 */

class GlobalAdmin extends ModelAdmin  {
    public static $managed_models = array('News');
    static $url_segment = 'global_config';
    static $menu_title = 'Global';
    static $model_importers = array();

    public function getEditForm($id = null, $fields = null) {
        $list = $this->getList();

        $listField = GridField::create(
            $this->sanitiseClassName($this->modelClass),
            false,
            $list,
            $fieldConfig = GridFieldConfig_RecordEditor::create($this->stat('page_length'))
                ->removeComponentsByType('GridFieldFilterHeader')
        );

        // Validation
        if(singleton($this->modelClass)->hasMethod('getCMSValidator')) {
            $detailValidator = singleton($this->modelClass)->getCMSValidator();
            $listField->getConfig()->getComponentByType('GridFieldDetailForm')->setValidator($detailValidator);
        }

        $form = CMSForm::create(
            $this,
            'EditForm',
            new FieldList($listField),
            new FieldList()
        )->setHTMLID('Form_EditForm');
        $form->setResponseNegotiator($this->getResponseNegotiator());
        $form->addExtraClass('cms-edit-form cms-panel-padded center');
        $form->setTemplate($this->getTemplatesWithSuffix('_EditForm'));
        $editFormAction = Controller::join_links($this->Link($this->sanitiseClassName($this->modelClass)), 'EditForm');
        $form->setFormAction($editFormAction);
        $form->setAttribute('data-pjax-fragment', 'CurrentForm');

        $this->extend('updateEditForm', $form);

        return $form;
    }
}