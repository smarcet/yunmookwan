<?php
/**
 * Created by JetBrains PhpStorm.
 * User: smarcet
 * Date: 8/9/13
 * Time: 5:45 PM
 * To change this template use File | Settings | File Templates.
 */

class TrainingAdmin  extends ModelAdmin  {

    public static $managed_models = array('Activity','TrainingDay','TrainingPlace','TrainingClass','OneTimeTrainingClass','Exam');
    static $url_segment = 'training';
    static $menu_title = 'Practica';

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

    public function getList() {
        $list = parent::getList();
        // Always limit by model class, in case you're managing multiple

        if($this->modelClass == 'TrainingClass') {
            $list = $list->filter('ClassName','TrainingClass');
        }

        if($this->modelClass == 'OneTimeTrainingClass') {
            $list = $list->filter('ClassName','OneTimeTrainingClass');
        }

        if($this->modelClass == 'Exam') {
            $list = $list->filter('ClassName','Exam');
        }
        return $list;
    }
}