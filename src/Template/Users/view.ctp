<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="card">
    <div class="card-body">
        <div class="users view large-9 medium-8 columns content">
            <?= $this->Html->link(__('<i class="fa fa-fw fa-lg fa-reply"></i> Back') ,['action' => 'index'], ['class' => 'btn btn-default icon-btn', 'escape' => false]) ?>
            <h3><?= h($user->id) ?></h3>
            <table class="table">
                <tr>
                    <th scope="row"><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="card-footer">
                <?= $this->Form->postLink(__('<i class="fa fa-fw fa-lg fa-times-circle"></i> Delete'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger icon-btn', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
            </div>
        </div>
    </div>    
</div>