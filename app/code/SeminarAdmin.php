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
    static $menu_title = 'Seminarios';

    static $model_importers = array();

    public function getList() {
        $list = parent::getList();
        // Always limit by model class, in case you're managing multiple
        if($this->modelClass == 'Seminar') {
            $list = $list->filter('ClassName','Seminar');
        }
        return $list;
    }

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