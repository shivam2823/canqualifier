<?php
$question_options = json_decode($question['question_options']);
$question_options = array_combine(array_values($question_options), $question_options);
//!empty($question->contractor_answers) ? $val=explode(',',$question->contractor_answers[0]->answer) : $val='' ;
?>
<?php
if($question['client_based']) {
	foreach($question['client_questions'] as $k => $v) { 
		$val = isset($answer[$v->client_id]) ? explode(',',$answer[$v->client_id]) : '';
	?>
	<div class="col-sm-12 client_based_answers">
	<div class="row">
	<div class="col-sm-3 mb-2">
		<strong><?= h($v['client']['company_name']) ?></strong>
	</div>
	<div class="col-sm-6 mb-2">
		<?= $this->Form->select('contractor_answers.'.$key.'.'.$k.'.answer', $question_options, ['multiple'=>'checkbox', 'default'=>$val]) ?>
		<?= $this->Form->control('contractor_answers.'.$key.'.'.$k.'.client_id', ['type'=>'hidden', 'value'=>$v->client_id]) ?>
		<?= $this->Form->control('contractor_answers.'.$key.'.'.$k.'.question_id', ['type'=>'hidden', 'value'=>$v->question_id]) ?>
	</div>
	</div>
	</div>
	<?php
	}
}
else {
	$val = explode(',',$answer[0]);
?>
<div class="col-sm-9">
	<?= $this->Form->select('contractor_answers.'.$key.'.answer', $question_options, ['multiple'=>'checkbox', 'default'=>$val]) ?>
	<?= $this->Form->control('contractor_answers.'.$key.'.question_id', ['type'=>'hidden', 'value'=>$question->id]); ?>
</div>
<?php
}
?>
