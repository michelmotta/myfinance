<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="expenses form large-9 medium-8 columns content">
            <?= $this->Form->create($expense, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Expense') ?></legend>
                <div class="form-group">
                    <?php echo $this->Form->input('name', ['class' => 'form-control']); ?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('value', ['type' => 'text', 'class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('categories._ids', ['options' => $categories, 'empty' => true, 'class' => 'form-control', 'id' => 'demoSelect']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('date', ['type' => 'text', 'id' => 'demoDate', 'class' => 'form-control']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $this->Form->input('receipt', ['type' => 'file', 'multiple' => 'true']); ?>
                            <?php echo $this->Form->input('receipt_dir', ['type' => 'hidden']); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('description', ['class' => 'form-control']); ?>
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
