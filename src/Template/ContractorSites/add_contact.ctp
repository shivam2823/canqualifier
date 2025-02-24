<?php
/*if(isset($site)){debug($site->name);}
if(isset($contractor)){debug($contractor);}
if(isset($client)){debug($client);}*/
//debug($siteContact);
$siteContact = '';
$disabled = false;
if(isset($is_locked) && $is_locked == 1){
    $disabled = true;
}
?>
<style>
    .hideMe{
        display: none;
    }
</style>
<div class="row roles contractors">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Location Contacts for Your Locations:</h3>
            </div>

            <div class="card-body card-block">

                <div id="new-contact">
                    <?php
                    if(empty($ConHuntonSites)){
                        echo '<p>No Location/s selected for The Hunton Group. Please click following link to add your work locations.</p>';
                        echo '<p>'.$this->Html->link('Add Location', ['controller'=>'ContractorSites', 'action'=>'add'], ['escape'=>false, 'title'=>'Add Location', 'target'=> '_blank']).'</p>';
                    }else{
                        echo $this->Form->create($siteContact);
                        if(empty($existingSiteContacts)){
                            $i = 0;
                            foreach($ConHuntonSites as $site_id => $site_name){
                                ?>
                                <div class="form-group">
                                    <?php echo $this->Form->label($site_name); ?>
                                    <?php echo $this->Form->control('site_id[]', ['type' => 'hidden', 'value' =>  $site_id]); ?>
                                </div>
                                <div class="form-group site_<?=$site_id?>">
                                    <?php echo $this->Form->control('name[]', ['class'=>'form-control','label' => 'Name','required' => true,'disabled' => $disabled]); ?>
                                </div>
                                <div class="form-group site_<?=$site_id?>">
                                    <?php echo $this->Form->control('email[]', ['class'=>'form-control','label' => 'Email','required' => true,'oninput'=>'this.value=this.value.toLowerCase()','disabled' => $disabled]); ?>
                                </div>
                                <div class="form-group site_<?=$site_id?>">
                                    <?php echo $this->Form->control('phone[]', ['class'=>'form-control','label' => 'Phone','required' => true,'disabled' => $disabled]); ?>
                                </div>
                                <hr>
                                <?php
                            }
                        }elseif(!empty($existingSiteContacts)){
                            foreach($existingSiteContacts as $record){
                                ?>
                                <div class="form-group">
                                    <?php echo $this->Form->label($record['site']->name); ?>
                                    <?php echo $this->Form->control('site_id[]', ['type' => 'hidden', 'value' =>  $record['site_id']]); ?>
                                    <?php echo $this->Form->control('id[]', ['type' => 'hidden', 'value' =>  $record['id']]); ?>
                                </div>
                                <div class="form-group site_<?=$record['site_id']?>">
                                    <?php echo $this->Form->control('name[]', ['class'=>'form-control','label' => 'Name','required' => true, 'value' => $record['name'],'disabled' => $disabled]); ?>
                                </div>
                                <div class="form-group site_<?=$record['site_id']?>">
                                    <?php echo $this->Form->control('email[]', ['class'=>'form-control','label' => 'Email','required' => true,'oninput'=>'this.value=this.value.toLowerCase()', 'value' => $record['email'],'disabled' => $disabled]); ?>
                                </div>
                                <div class="form-group site_<?=$record['site_id']?>">
                                    <?php echo $this->Form->control('phone[]', ['class'=>'form-control','label' => 'Phone','required' => true, 'value' => $record['phone'],'disabled' => $disabled]); ?>
                                </div>
                                <hr>
                                <?php
                            }
                        }
                        ?>
                        <div class="form-actions form-group">
                            <?php
                            echo $this->Form->control('contractor_id', ['type'=>'hidden', 'value' => $contractor_id, 'id'=>'contractor_id']);
                            echo $this->Form->button('<em><i class="fa fa-dot-circle-o"></i></em> Save and Continue', ['type' => 'submit', 'class' =>'btn btn-success']);
                            ?>
                        </div>
                        <?php
                        echo $this->Form->end();
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
/*    jQuery( document ).ready(function() {
       / jQuery(".sameAs").change(function(){
            alert(jQuery(this).val());
            var clickedSite = jQuery(this).attr('data-siteid');

            if(jQuery(this).val() != ''){
                //jQuery('.site_' + clickedSite).hide();
                jQuery('.site_' + clickedSite + ' input').removeAttr('required');
            }else{
               // jQuery('.site_' + clickedSite).show();
                jQuery('.site_' + clickedSite + ' input').attr('required', true);
            }

        });
    });
*/
    /*if(clickedTab == 'existing-user'){
                    //fetch users
                        jQuery.ajax({
                            url: 'http://localhost/canqualifier/ContractorSites/getUsers',
                            data: "contactor_id=" + jQuery('#contractor_id').val(),
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': csrfToken },
                            success: function(data) {
                                jQuery(this).html(data);
                            }
                        });
                }else if(clickedTab == 'existing-contact'){
                    alert(jQuery('#contractor_id').val());
                    //fetch site_contacts
                    jQuery.ajax({
                        url: 'http://localhost/canqualifier/ContractorSites/getSiteContacts',
                        data: "contractor_id=" + jQuery('#contractor_id').val(),
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        success: function(data) {
                            jQuery("#existing-contact").html(data);
                        }
                    });
                }*/
</script>
