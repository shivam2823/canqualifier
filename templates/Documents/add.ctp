<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
 use Cake\Core\Configure;
$uploaded_path = Configure::read('uploaded_path');
?>

<div class="row documents">
<div class="col-lg-12">
<div class="card">
	<div class="card-header">
		<?php if($document_id==null) { ?>
		<strong>Add New</strong> Document
		<?php } else { ?>
		<strong>Upload Document</strong> Version
		<?php 
		}
		?>
	</div>
	<div class="card-body card-block">
	<?= $this->Form->create($document) ?>
	<div class="row form-group">
		<?= $this->Form->label('Document Name', null, ['class'=>'col-sm-3']); ?>
		<div class="col-sm-9">
		<?php if($document_id==null) {
			echo $this->Form->control('name', ['class'=>'form-control', 'required'=>false, 'label'=>false]);
		} else {
			echo $getParentDoc->name;
		} ?>
		</div>
	</div>
	<div class="row form-group">
	<?php $fileCss = $document->document!='' ? "display:none;" : ""; ?>
	<?= $this->Form->label('Upload Document', null, ['class'=>'col-sm-3']); ?><br />
	<div class="col-sm-9 uploadWraper">
		<?php echo $this->Form->control('document', ['label'=>false, 'type'=>'hidden', 'class'=>'documentName']); ?>
		<?php echo $this->Form->file('uploadFile', ['label'=>false,'style'=>$fileCss]); ?>
		<div class="uploadResponse">
			<?php if($document->document!='') { ?>
			<a href="<?= $uploaded_path.$document->document ?>" class="uploadUrl" data-file="<?= $document->document ?>" target="_Blank"><?= $document->document ?></a>
			<?= $this->Html->link('<i class="fa fa-times-circle"></i>', ['controller'=>'Uploads', 'action' => 'deleteFile', $document->document], ['escape'=>false, 'title' => 'Remove', 'class'=>'ajaxfileDelete btn btn-sm']);?>
			<?php }  ?>
		 </div>
	</div>
	</div>	
	<!--<div class="form-group">
		<?php //echo $this->Form->control('document_id', ['class'=>'form-control', 'checked'=>'checked']); ?>
	</div>-->
	<div class="form-actions form-group">
		<?= $this->Form->button('<em><i class="fa fa-dot-circle-o"></i></em> Submit', ['type' => 'submit', 'class'=>'btn btn-primary btn-sm']); ?>
		<?= $this->Form->button('<em><i class="fa fa-ban"></i></em> Reset', ['type' => 'reset', 'class'=>'btn btn-danger btn-sm']); ?>
	</div>
	<?= $this->Form->end() ?>
	</div>
</div>
</div>
</div>
