<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientUser $clientUser
 */
?>
<div class="row clientUsers">
<div class="col-lg-6">
<div class="card">
	<div class="card-header">
		<strong>Add New</strong> Client User
	</div>
	<div class="card-body card-block">
	<?= $this->Form->create($clientUser) ?>
		<div class="form-group">
			<?php echo $this->Form->control('user.username', ['class'=>'form-control','label' => 'Email','required' => false,'oninput'=>'this.value=this.value.toLowerCase()']); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->control('user.password', ['class'=>'form-control','required' => false, 'value'=> '']); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->control('user.confirm_password', ['type'=>'password','class'=>'form-control','required' => false]); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->control('pri_contact_fn', ['class'=>'form-control', 'label'=>'First Name', 'required' => false]); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->control('pri_contact_ln', ['class'=>'form-control', 'label'=>'Last Name', 'required' => false]); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->control('pri_contact_pn', ['id'=>'txtPhone', 'class'=>'form-control', 'placeholder'=>'(123)-456-7890', 'label'=>'Phone No.', 'required' => false]); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->control('site_ids', ['options' => $clientSites, 'class'=>'form-control selectwithcheckbox', 'label'=>'Select Sites', 'multiple'=>'multiple']); ?>
		</div>		
		<div class="form-group">
			<?php echo $this->Form->control('user.role_id', ['options' => $roles, 'class'=>'form-control', 'required' => true]); ?>
		</div>
		<div class="form-group">
            <?php echo $this->Form->control('user.active', ['required'=>false, 'checked'=>'checked']); ?>
		</div>
	
		<div class="form-actions form-group">
			<?= $this->Form->button('<em><i class="fa fa-dot-circle-o"></i></em> Submit', ['type' => 'submit', 'class'=>'btn btn-primary btn-sm']); ?>
			<?= $this->Form->button('<em><i class="fa fa-ban"></i></em> Reset', ['type' => 'reset', 'class'=>'btn btn-danger btn-sm']); ?>
		</div>
	<?= $this->Form->end() ?>
	</div>
</div>
</div>
</div>
