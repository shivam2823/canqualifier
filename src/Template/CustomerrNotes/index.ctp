<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerrNote[]|\Cake\Collection\CollectionInterface $customerrNotes
 */
$filter_options = array('0'=>'All', '1'=>'Notes','2'=>'Follow Ups');
$users = array(SUPER_ADMIN,CR);
?>
<div class="row customerrNotes">
<div class="col-lg-12">
<div class="card">
	<div class="card-header">
		<strong class="card-title"><?= __('Notes') ?></strong>

		<div class="">
		<?= $this->Form->create('', ['class'=>'form-inline']) ?>
		<div class="form-group"><?= $this->Form->text('from_date', ['class'=>'form-control from_date','placeholder'=>'Created From']) ?></div>
		<div class="form-group"><?= $this->Form->text('to_date', ['class'=>'form-control to_date','placeholder'=>'Created to']) ?></div>
		<div class="form-group"><?= $this->Form->select('follow_up_range', $filter_options, ['class'=>'form-control','label'=>false]) ?></div>
		<div class="form-actions form-group"><?= $this->Form->button('<em><i class="fa fa-dot-circle-o"></i></em> Submit', ['type'=>'submit', 'class'=>'btn btn-primary btn-sm']); ?></div>
		<!--
		<?= $this->Html->link('Follow Ups', ['action' => 'index', 1],['escape'=>false, 'title' => 'Follow Ups', 'class'=>'btn btn-secondary btn-success mr-2']) ?>		
		<?= $this->Html->link('Notes', ['action' => 'index',2],['escape'=>false, 'title' => 'Notes', 'class'=>'btn btn-secondary btn-success mr-2']) ?>-->
		<?= $this->Form->end() ?>
		</div>
	</div>
	
	<div class="card-body table-responsive">
	<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th scope="col"><?= h('subject') ?></th>
		<th scope="col"><?= h('Note') ?></th>
		<th scope="col"><?= h('Contractor') ?></th>
		<th scope="col"><?= h('Created') ?></th>
		<th scope="col" class="actions"><?= h('Actions') ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($customerrNotes as $customerrNote): ?>
	<tr>
		<td><?= h($customerrNote->subject) ?></td>
		<td><?= html_entity_decode($customerrNote->notes)?></td>
		<td><?= $customerrNote->has('contractor') ? $this->Html->link($customerrNote->contractor->company_name, ['controller' => 'Contractors', 'action' => 'dashboard', $customerrNote->contractor->id]) : '' ?></td>
		<td><?= h($customerrNote->created) ?></td>
		<td class="actions">
		<?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $customerrNote->id],['escape'=>false, 'title' => 'View']) ?>
		<?= $this->Html->link('<i class="fa fa-pencil"></i>', ['action' => 'edit', $customerrNote->id],['escape'=>false, 'title' => 'Edit']) ?>
		<?php if (in_array($activeUser['role_id'], $users)) { ?>
		<?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', $customerrNote->id], ['escape'=>false, 'title' => 'Delete', 'confirm' => __('Are you sure you want to delete # {0}?', $customerrNote->id)]) ?>
		<?php } ?>
		</td>		
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	</div>
</div>
</div>
</div>
