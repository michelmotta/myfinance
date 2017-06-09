<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
      <div class="categories form large-9 medium-8 columns content">
          <?= $this->Form->create($category) ?>
          <fieldset>
              <legend><?= __('Edit Category') ?></legend>
              <div class="row">
                 <div class="col-md-6">
                    <?= $this->Form->input('name', ['class' => 'form-control']); ?>
                 </div>
                 <div class="col-md-6">
                    <?= $this->Form->input('type', ['options' => ['revenue' => 'Revenue', 'expense' => 'Expense'], 'class' => 'form-control']); ?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-md-12">
                    <?= $this->Form->input('description', ['class' => 'form-control']); ?>
                 </div>
              </div>
          </fieldset>
          <div class="card-footer">
             <?= $this->Form->button(__('<i class="fa fa-fw fa-lg fa-check-circle"></i> Submit'), ['class' => 'btn btn-primary icon-btn', 'escape' => false]) ?>
             <?= $this->Form->end() ?>
             <?= $this->Html->link(__('<i class="fa fa-fw fa-lg fa-times-circle"></i> Cancel') ,['action' => 'index'], ['class' => 'btn btn-default icon-btn', 'escape' => false]) ?>
          </div>
      </div>
   </div>
</div>
