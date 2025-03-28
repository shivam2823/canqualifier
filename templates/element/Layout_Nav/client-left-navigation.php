<?php
$users = array(SUPER_ADMIN,ADMIN,CLIENT,CLIENT_ADMIN);
?>
<li class="sidebar-title">Menu</li>
<li class="sidebar-item <?= (!empty($currentPage) && $currentPage == 'Dashboard') ? 'active' :'' ?> ">
    <?= $this->Html->link(__('<i class="bi bi-grid-fill"></i><span>Dashboard</span>'), ['controller'=>'Clients', 'action'=>'dashboard'], ['escape'=>false, 'title'=>'Dashboard', 'class'=>'sidebar-link']) ?>
</li>
<?php if($activeUser['role_id'] == SUPER_ADMIN || $activeUser['role_id'] == ADMIN) { ?>
<h3 class="sidebar-title"></h3>
<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'Manage Locations') ? 'active' :'' ?>">
    <?= $this->Html->link(__('<i class="menu-icon fa fa-building-o"></i> Manage Locations'), ['controller'=>'ContractorSites', 'action'=>'manageSites'], ['escape'=>false, 'title'=>'Manage Locations']) ?>
</li>
<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'Client Requests') ? 'active' :'' ?>">
    <?= $this->Html->link(__('<i class="menu-icon fa fa-exchange"></i> Client Requests'), ['controller'=>'ClientRequests', 'action'=>'index'], ['escape'=>false, 'title'=>'Client Requests']) ?>
</li>
<!--<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'Skill Assessment Documents') ? 'active' :'' ?>">
    <?php //echo $this->Html->link(__('<i class="menu-icon fa fa-file"></i> Skill Assessment Documents'), ['controller'=>'SkillAssessments', 'action'=>'index'], ['escape'=>false, 'title'=>'Skill Assessment Documents ']) ?>
</li>-->
<?php $clients = $this->User->getClients($activeUser['contractor_id']); 
              $visited_client = $this->Category->SiteVisit($clients);
        if(!empty($activeUser['client_id']) && in_array($activeUser['client_id'], $visited_client)){ ?>
<?php $contractor_id = $activeUser['contractor_id']; ?>
<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'Contractor Visits') ? 'active' :'' ?>">
<?= $this->Html->link(__('<i class="menu-icon fa fa-exchange"></i><span>Contractor Visits</span>'), ['controller'=>'SiteVisits', 'action'=>'index',$contractor_id], ['escape'=>false, 'title'=>'Contractor Visits','class'=>'sidebar-link']) ?>
</li>
<?php }
    }

    if(isset($service_id) && $service_id!=null) {
    if($service_id==6) { ?>
<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'OSHA Safety Rates') ? 'active' :'' ?>">
    <?= $this->Html->link(__('<i class="bi bi-file-earmark-text"></i><span>OSHA Safety Rates</span>'), ['controller'=>'ContractorAnswers', 'action'=>'safety_report', $service_id], ['escape'=>false, 'title'=>'OSHA Safety Rates', 'class'=>'sidebar-link']) ?>
</li>
<?php
    $expCount = $this->Category->getExplanationsCount($activeUser['contractor_id']);
    if($activeUser['role_id'] == SUPER_ADMIN || $activeUser['role_id'] == ADMIN || $activeUser['role_id'] == CONTRACTOR || $activeUser['role_id'] == CONTRACTOR_ADMIN) { ?>
<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'Explanations') ? 'active' :'' ?>">
    <?= $this->Html->link(__('Supplier Explanations (' . $expCount . ')'), ['controller'=>'Explanations', 'action'=>'add', $service_id], ['escape'=>false, 'title'=>'Explanations', 'class'=>'sidebar-link']) ?>
</li>
<?php
    }
    else { ?>
<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'Explanations') ? 'active' :'' ?>">
    <?= $this->Html->link(__('Supplier Explanations (' . $expCount . ')'), ['controller'=>'Explanations', 'action'=>'index', $service_id], ['escape'=>false, 'title'=>'Explanations', 'class'=>'sidebar-link']) ?>
</li>
<?php }
    
    $contractor = $this->User->getContractor($activeUser['contractor_id']);
    if (($contractor->waiting_on == 'CanQualify' || $contractor->waiting_on == 'Contractor') && ($activeUser['role_id'] == SUPER_ADMIN || $activeUser['role_id'] == ADMIN)) {   
    if($contractor->payment_status && $contractor->subscription_date!=null) {
    $total_complete = true;
    $services = $this->Category->getServices($activeUser['contractor_id']);
    if(!empty($services)){
     foreach ($services as $serviceId => $service_name) {
            if ($serviceId == 4) { // employeeQual              
                continue;
            }
            elseif($serviceId==3) { // AuditQual
                continue;
            }
            if($serviceId == 2){
                $categories = $this->Category->getInsCategories($activeUser, $serviceId, false);
            }else{
                $categories = $this->Category->getCategories($activeUser, $serviceId, false);
            }
            if(!empty($categories)) {
            foreach($categories as $cat) {
                if($cat['getPerc'] !='100%') {                  
                    $total_complete = false;
                    break;
                }
            }}else{
                $total_complete = false;
            }
            }
        }}
    // if ($contractor->waiting_on == 'CanQualify' || $contractor->waiting_on == 'Contractor' && ($activeUser['role_id'] == SUPER_ADMIN || $activeUser['role_id'] == ADMIN && $total_complete == true)) {
    if ($total_complete == true) {
    // echo '<li>'.$this->Html->link(__('Re-generate Suggested Icon'), ['controller'=>'ContractorAnswers', 'action'=>'final-submit', $service_id], ['escape'=>false, 'title'=>'Re-generate Suggested Icon']).'</li>';

    if (isset($activeUser['client_id'])) {
        if(in_array($activeUser['client_id'], array(21))){
            echo '<li>' . $this->Html->link(__('CanQualify Review'), ['controller'=>'OverallIcons', 'action'=>'review-supplier', $activeUser['contractor_id'], $activeUser['client_id']]) .'</li>';

        }else {
            echo '<li>' . $this->Html->link(__('CanQualify Review'), ['controller' => 'OverallIcons', 'action' => 'forceChange', $activeUser['client_id'], $activeUser['contractor_id'], 1, $total_complete], ['title' => 'Review', 'class' => 'ajaxmodal forceicon', 'data-toggle' => 'modal', 'data-target' => '#scrollmodal2']) . '</li>';
        }
    } else {
    echo '<li>' . $this->Html->link(__('CanQualify Review'), ['controller'=>'OverallIcons', 'action'=>'forceChangeAdmin', 0, $activeUser['contractor_id'], 1,$total_complete], ['title'=>'Review']) . '</li>';
    }
    }}
    ?>
<?php
    if (isset($activeUser['client_id'])  && $activeUser['role_id'] != CLIENT_VIEW) { ?>
<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'Explanations') ? 'active' :'' ?>">
    <?= $this->Html->link(__('Force Icon'), ['controller'=>'OverallIcons', 'action'=>'forceChange', $activeUser['client_id'], $activeUser['contractor_id']], ['title'=>'Force Icon', 'class'=>'ajaxmodal forceicon sidebar-link', 'data-toggle'=>'modal', 'data-target'=>'#scrollmodal2']) . '</li>';
    }
    elseif($activeUser['role_id'] == SUPER_ADMIN || $activeUser['role_id'] == ADMIN) { ?>
<li class="submenu-item <?= (!empty($currentPage) && $currentPage == 'Explanations') ? 'active' :'' ?>">
    <?= $this->Html->link(__('Force Icon'), ['controller'=>'OverallIcons', 'action'=>'forceChangeAdmin', 0, $activeUser['contractor_id']], ['title'=>'Force Icon','class'=>'sidebar-link']) . '</li>';
    }
    }
    
    if($service_id != 4) {
        echo $this->element('categories-client-navigation');
        echo $this->element('archived-categories-client-navigation');
    }
    
    
    if($service_id == 4) { ?>
    <h3 class="sidebar-title">EmployeeQUAL</h3>
    <hr>
<li class="sidebar-item <?= (!empty($currentPage) && $currentPage == 'Employee') ? 'active' :'' ?>">
    <?= $this->Html->link(__('<i class="bi bi-person-fill"></i><span>Employees</span>'), ['controller'=>'Employees', 'action'=>'index', $service_id], ['escape'=>false, 'title'=>'Employee','class'=>'sidebar-link']) ?>
</li>
</li>
<?php
    } // if $service_id==4
    } // if service_id  

    if(isset($employeeNav) && $employeeNav==true && isset($activeUser['employee_id'])) { 
        echo $this->element('Layout_Nav/clientEmp-left-naviagtion');    
        /* ?>
<?php echo !empty($employee) ? '<li>'.$this->Html->link(__($employee->pri_contact_fn.' '.$employee->pri_contact_ln), ['controller'=>'employees', 'action'=>'dashboard', $activeUser['employee_id']], ['class'=>'btn btn-success']).'</li>' : '' ;
        $empExpCount = $this->Training->getEmpExplanationsCount($activeUser['employee_id']); ?>
<li>
    <?= $this->Html->link(__('Documents and Uploads (' . $empExpCount . ')'), ['controller'=>'EmployeeExplanations', 'action'=>'add'], ['escape'=>false, 'title'=>'Documents and Uploads']) ?>
</li>
<?php echo $this->element('trainings');*/ ?>
<?php   
    } // if employeeNav
    ?>
