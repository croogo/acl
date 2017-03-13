<?php
$this->extend('Croogo/Core./Common/admin_edit');

$this->Html
        ->add(__d('croogo', 'Users'), array('plugin' => 'Croogo/Users', 'controller' => 'Users', 'action' => 'index'))
    ->add(__d('croogo', 'Permissions'), array('plugin' => 'Croogo/Acl', 'controller' => 'Permissions'))
    ->add(__d('croogo', 'Actions'), array('plugin' => 'Croogo/Acl', 'controller' => 'Actions', 'action' => 'index'));

if ($this->request->param('action') == 'edit') {
    $this->Breadcrumbs->add($aco->id . ': ' . $aco->alias, '/' . $this->request->url);
}

if ($this->request->param('action') == 'add') {
    $this->Breadcrumbs->add(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->assign('form-start', $this->Form->create($aco));

$this->append('tab-heading');
    echo $this->Croogo->adminTab(__d('croogo', 'Action'), '#action-main');
    echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

    echo $this->Form->input('parent_id', array(
        'options' => $acos,
        'empty' => true,
        'label' => __d('croogo', 'Parent'),
        'help' => __d('croogo', 'Choose none if the Aco is a controller.'),
    ));
    $this->Form->templates(array(
        'class' => 'span10',
    ));
    echo $this->Form->input('alias', array(
        'label' => __d('croogo', 'Alias'),
    ));

    echo $this->Croogo->adminTabs();

$this->end();
