<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="categories view large-9 medium-8 columns content">
            <?= $this->Html->link(__('<i class="fa fa-fw fa-lg fa-reply"></i> Back') ,['action' => 'index'], ['class' => 'btn btn-default icon-btn', 'escape' => false]) ?>
            <h3><?= h($category->name) ?></h3>
            <table class="table">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Type') ?></th>
                    <td><?= h($category->type) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($category->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($category->modified) ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <h4><?= __('Description') ?></h4>
                    <?= $this->Text->autoParagraph(h($category->description)); ?>
                </div>
            </div>
            <div class="card-footer">
                <?= $this->Form->postLink(__('<i class="fa fa-fw fa-lg fa-times-circle"></i> Delete'), ['action' => 'delete', $category->id], ['class' => 'btn btn-danger icon-btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
            </div>
        </div>
    </div>    
</div>