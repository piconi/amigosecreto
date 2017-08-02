<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Invitation[]|\Cake\Collection\CollectionInterface $invitation
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invitation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invitation index large-9 medium-8 columns content">
    <h3><?= __('Invitation') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('checked') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invitation as $invitation): ?>
            <tr>
                <td><?= $this->Number->format($invitation->id) ?></td>
                <td><?= $invitation->has('user') ? $this->Html->link($invitation->user->id, ['controller' => 'Users', 'action' => 'view', $invitation->user->id]) : '' ?></td>
                <td><?= $invitation->has('group') ? $this->Html->link($invitation->group->name, ['controller' => 'Groups', 'action' => 'view', $invitation->group->id]) : '' ?></td>
                <td><?= h($invitation->checked) ?></td>
                <td><?= h($invitation->created) ?></td>
                <td><?= h($invitation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $invitation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invitation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invitation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invitation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
