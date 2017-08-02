<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Invitation $invitation
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invitation'), ['action' => 'edit', $invitation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invitation'), ['action' => 'delete', $invitation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invitation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invitation'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invitation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invitation view large-9 medium-8 columns content">
    <h3><?= h($invitation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $invitation->has('user') ? $this->Html->link($invitation->user->id, ['controller' => 'Users', 'action' => 'view', $invitation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $invitation->has('group') ? $this->Html->link($invitation->group->name, ['controller' => 'Groups', 'action' => 'view', $invitation->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Checked') ?></th>
            <td><?= h($invitation->checked) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($invitation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($invitation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($invitation->modified) ?></td>
        </tr>
    </table>
</div>
