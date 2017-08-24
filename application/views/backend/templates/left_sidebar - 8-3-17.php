<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <!--            <li class="sidebar-search-wrapper">
            
                            <form class="sidebar-search  sidebar-search-bordered" action="page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
            
                        </li>-->
            <?php if ($role_code == 'SITEADM' || $role_code == 'FIRMADM') { ?>
                <li class="nav-item start ">
                    <a href="<?php echo $base_url; ?>dashboard" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item <?php
                if ($controller_name == 'section' || $controller_name == 'firm_sg' || $controller_name == 'firm_sections' || $controller_name == 'firm_pa' || $controller_name == 'app_codes' || $controller_name == 'firm_codes' || $controller_name == 'firm_sg_sections' || $controller_name == 'practice_area_survey' || $controller_name == 'practice_area' || $controller_name == 'city_state_country' || $controller_name == 'app_users' || $controller_name == 'app_profiles' || $controller_name == 'ui_lists_security' || $controller_name == 'register_user' || $controller_name == 'import_csv' || $controller_name == 'super_admin') {
                    echo 'open';
                }
                ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">Settings</span>
                        <span class="arrow <?php
                        if ($controller_name == 'sections' || $controller_name == 'firm_sg' || $controller_name == 'firm_sections' || $controller_name == 'firm_pa' || $controller_name == 'app_codes' || $controller_name == 'firm_codes' || $controller_name == 'firm_sg_sections' || $controller_name == 'practice_area_survey' || $controller_name == 'practice_area' || $controller_name == 'city_state_country' || $controller_name == 'app_users' || $controller_name == 'app_profiles' || $controller_name == 'ui_lists_security' || $controller_name == 'register_user' || $controller_name == 'import_csv' || $controller_name == 'super_admin') {
                            echo 'open';
                        }
                        ?>">
                        </span>
                    </a>
                    <ul <?php if ($controller_name == 'sections' || $controller_name == 'firm_sg' || $controller_name == 'firm_sections' || $controller_name == 'firm_pa' || $controller_name == 'app_codes' || $controller_name == 'firm_codes' || $controller_name == 'firm_sg_sections' || $controller_name == 'practice_area_survey' || $controller_name == 'practice_area' || $controller_name == 'city_state_country' || $controller_name == 'app_users' || $controller_name == 'app_profiles' || $controller_name == 'ui_lists_security' || $controller_name == 'register_user' || $controller_name == 'import_csv' || $controller_name == 'super_admin') { ?> style="display: block;"<?php } else { ?> style="display: none;" <?php } ?>class="sub-menu">
                        <!--Only Site admin  can see app codes-->
                        <?php if ($role_code == 'SITEADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'app_codes') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>app-codes" class="nav-link ">
                                    <span class="title">App Codes</span> <!-- [Firm admin : View] --> <!-- [Attorney : View] -->
                                </a>
                            </li>
                        <?php } ?>
                        <!--Only Site admin and Firm admin can see codes-->
                        <?php if ($role_code == 'SITEADM' || $role_code == 'FIRMADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'firm_codes') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>firm-codes" class="nav-link ">
                                    <span class="title">
                                        <?php if ($role_code == 'SITEADM') { ?>
                                            Firm
                                        <?php } ?>
                                        <?php if ($role_code == 'FIRMADM') { ?>
                                            My
                                        <?php } ?>
                                        Codes
                                    </span> <!-- [Firm admin] --> <!-- [Attorney : View] -->
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($role_code == 'SITEADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'sections') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>sections" class="nav-link ">
                                    <span class="title">Sections</span> <!-- [Firm admin] --> <!-- [Attorney : View] -->
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item <?php if ($controller_name == 'firm_sections') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>firm-sections" class="nav-link ">
                                    <span class="title">Firm Sections</span> <!-- [Firm admin] --> <!-- [Attorney : View] -->
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($role_code == 'FIRMADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'firm_sg') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>firm-sg" class="nav-link ">
                                    <span class="title">Firm SG </span> <!-- [Firm admin] --> <!-- [Attorney : View] -->
                                </a>
                            </li>
                        <?php } ?>
                        
<!--                        <li class="nav-item <?php if ($controller_name == 'practice_area_survey') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>practice-area-survey" class="nav-link ">
                                <span class="title">Practice Area Survey</span>  [Firm admin]   [Attorney] 
                            </a>
                        </li>-->
                        <?php if ($role_code == 'SITEADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'practice_area') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>practice-area" class="nav-link ">
                                    <span class="title">Practice Area</span>
                                </a>
                            </li>
                        <?php } ?>
                            <li class="nav-item <?php if ($controller_name == 'firm_pa') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>firm-pa" class="nav-link ">
                                    <span class="title">Firm Practice Area </span> <!-- [Firm admin] --> <!-- [Attorney : View] -->
                                </a>
                            </li>
                        <?php if ($role_code == 'SITEADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'import_csv' && $method_name == 'index') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>import_csv" class="nav-link ">
                                    <span class="title">Import Excel Data</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                                </a>
                            </li>
                            <li class="nav-item <?php if ($controller_name == 'import_csv' && $method_name == 'importUserList') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>import_csv/importUserList" class="nav-link ">
                                    <span class="title">Imported Users List</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($role_code == 'SITEADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'city-state-country') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>city-state-country" class="nav-link ">
                                    <span class="title">City-Country-State</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item <?php if ($controller_name == 'app_users') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>app-users" class="nav-link ">
                                <span class="title">App Users</span>
                            </a>
                        </li>
                        <?php if ($role_code == 'SITEADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'app_profiles') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>app-profiles" class="nav-link ">
                                    <span class="title">App Profiles</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($controller_name == 'ui_lists_security') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>ui-lists-security" class="nav-link ">
                                    <span class="title">UI Lists & Security</span>
                                </a>
                            </li>

                            <li class="nav-item <?php if ($controller_name == 'register_user') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>register-user" class="nav-link ">
                                    <span class="title">Registered Users</span>
                                </a>
                            </li>

                            <li class="nav-item <?php if ($controller_name == 'super_admin') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>super_admin" class="nav-link ">
                                    <span class="title">Super User</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>

                <li class="nav-item <?php
                if ($controller_name == 'firm' || $controller_name == 'attorney' || $controller_name == 'employee' || ($controller_name == 'competitor' && $method_name == 'view_rank') || $controller_name == 'targets' || $controller_name == 'client_master' || $controller_name == 'target_conversion' || ($controller_name == 'competitor' && $method_name == 'index')) {
                    echo 'open';
                }
                ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-magnet"></i>
                        <span class="title">
                            Firm
                            Operation
                        </span>
                        <span class="arrow <?php
                        if ($controller_name == 'firm' || $controller_name == 'attorney' || $controller_name == 'employee' || ($controller_name == 'competitor' && $method_name == 'view_rank') || $controller_name == 'targets' || $controller_name == 'client_master' || $controller_name == 'target_conversion' || ($controller_name == 'competitor' && $method_name == 'index')) {
                            echo 'open';
                        }
                        ?>"></span>
                    </a>
                    <ul <?php if ($controller_name == 'firm' || $controller_name == 'attorney' || $controller_name == 'employee' || ($controller_name == 'competitor' && $method_name == 'view_rank') || $controller_name == 'targets' || $controller_name == 'client_master' || $controller_name == 'target_conversion'|| ($controller_name == 'competitor' && $method_name == 'index')) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>  class="sub-menu">
                        <?php if ($role_code == 'SITEADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'firm') { ?> menu_active<?php } ?>" >
                                <a href="<?php echo $base_url; ?>firm" class="nav-link ">
                                    <span class="title">Firms</span> <!-- [Firm admin : Own Firm View] --> <!-- [Attorney : Own Firm View] -->
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($role_code == 'FIRMADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'firm') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>firm/my-firm" class="nav-link ">
                                    <span class="title">My Firm</span> <!-- [Firm admin : Own Firm View] --> <!-- [Attorney : Own Firm View] -->
                                </a>
                            </li>
                        <?php } ?>

                        <li class="nav-item <?php if ($controller_name == 'attorney') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>attorney" class="nav-link">
                                <span class="title"> Attorneys </span> <!-- [Firm admin] --> <!-- [Attorney : Self/Team View] -->
                            </a>
                        </li>
                        <li class="nav-item <?php if ($controller_name == 'employee') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>employee" class="nav-link ">
                                <span class="title">Employees/ Staffs</span> <!-- [Firm admin] --> <!-- [Attorney : View] -->
                            </a>
                        </li>

                        <li class="nav-item <?php if ($controller_name == 'competitor' && $method_name == 'index') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>competitor" class="nav-link ">
                                <span class="title">Competitors</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                            </a>
                        </li>
                        <li class="nav-item <?php if ($controller_name == 'competitor' && $method_name == 'view_rank') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>competitor/view_rank" class="nav-link ">
                                <span class="title">All Competitor Ranks</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                            </a>
                        </li>
                        <li class="nav-item <?php if ($controller_name == 'targets') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>targets" class="nav-link ">
                                <span class="title">Targets</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                            </a>
                        </li>
                        <li class="nav-item <?php if ($controller_name == 'client_master') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>client-master" class="nav-link ">
                                <span class="title">Clients</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                            </a>
                        </li>
                        <?php if ($role_code == 'FIRMADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'target_conversion') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>target-conversion" class="nav-link ">
                                    <span class="title">Target-Client Conversion</span> <!-- [Firm admin] --> <!-- [Attorney : View] -->
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item <?php
                if ($controller_name == 'attorney_goals' || $controller_name == 'activity' || $controller_name == 'activity_approvals' || $controller_name == 'hour_budgeting_tools' || $controller_name == 'audit_trails') {
                    echo 'open';
                }
                ?>">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-action-redo"></i>
                        <span class="title">
                            Firm
                            Transactions
                        </span>
                        <span class="arrow <?php
                        if ($controller_name == 'attorney_goals' || $controller_name == 'activity' || $controller_name == 'activity_approvals' || $controller_name == 'budgeting' || $controller_name == 'audit_trails' || $controller_name == 'activity_budegt_report') {
                            echo 'open';
                        }
                        ?>"></span>
                    </a>
                    <ul <?php if ($controller_name == 'attorney_goals' || $controller_name == 'activity' || $controller_name == 'activity_approvals' || $controller_name == 'budgeting' || $controller_name == 'audit_trails' || $controller_name == 'activity_budegt_report') { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?> class="sub-menu">
                        <?php if ($role_code == 'FIRMADM') { ?>
                            <li class="nav-item <?php if ($controller_name == 'attorney_goals') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>attorney-goals" class="nav-link ">
                                    <span class="title">Attorney Goals</span> <!-- [Site admin] --> <!-- [Attorney] -->
                                </a>
                            </li>
                            <li class="nav-item <?php if ($controller_name == 'activity') { ?> menu_active<?php } ?>">
                                <a href="<?php echo $base_url; ?>activity" class="nav-link ">
                                    <span class="title">Activity</span> <!-- [Site admin] -->  <!-- [Attorney] -->
                                </a>
                            </li>

                            <?php if ($approver) { ?>
                                <li class="nav-item <?php if ($controller_name == 'activity_approvals') { ?> menu_active<?php } ?>">
                                    <a href="<?php echo $base_url; ?>activity-approvals" class="nav-link ">
                                        <span class="title">Activity Approvals</span> <!-- [Site admin] --> <!-- [Attorney : View] -->
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <li class="nav-item <?php if ($controller_name == 'budgeting') { ?> menu_active<?php } ?>">
                            <a href="<?php echo $base_url; ?>budgeting" class="nav-link ">
                                <span class="title">Hour Budgeting Tool</span> <!-- [Site admin] --> <!-- [Attorney] -->
                            </a>
                        </li>

                        <li class="nav-item <?php if ($controller_name == 'audit_trails') { ?> menu_active<?php } ?>" >
                            <a href="<?php echo $base_url; ?>audit-trails" class="nav-link ">
                                <span class="title">Audit Trails</span> <!-- [Site admin] -->
                            </a>
                        </li>
            <?php if ($role_code == 'FIRMADM') {  ?> 
                        <li class="nav-item <?php if ($controller_name == 'activity_budget_report') { ?> menu_active<?php } ?>" >
                            <a href="<?php echo $base_url; ?>activity-budget-report" class="nav-link ">
                                <span class="title">Activity Budget Report</span> <!-- [Firm admin only] -->
                            </a>
                        </li>
                <?php } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">Reports</span>
                        <span class="arrow"></span>
                    </a>
                    <ul style="display: none;" class="sub-menu">
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link ">
                                <span class="title">MIS Reports</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link ">
                                <span class="title">Adhoc Reports</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="layout_classic_page_head.html" class="nav-link ">
                                <span class="title">Periodic Reports</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } elseif ($role_code == 'ATTRMGR' || $role_code == 'ATTR') {
                ?>

                <li class="nav-item start <?php if ($controller_name == 'dashboard') { ?> menu_active<?php } ?>">
                    <a href="<?php echo $base_url; ?>dashboard" class="nav-link">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item <?php if ($controller_name == 'attorney') { ?> menu_active<?php } ?>" >
                    <a href="<?php echo $base_url; ?>attorney/edit/<?php echo base64_encode($attorney_seq_no); ?>" class="nav-link">
                        <i class="icon-user"></i>
                        <span class="title">My Profile</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($controller_name == 'targets') { ?> menu_active<?php } ?>">
                    <a href="<?php echo $base_url; ?>targets" class="nav-link ">
                        <i class="icon-magnet"></i>
                        <span class="title">Targets</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                    </a>
                </li>
                <li class="nav-item <?php if ($controller_name == 'client_master') { ?> menu_active<?php } ?>" >
                    <a href="<?php echo $base_url; ?>client-master" class="nav-link ">
                        <i class="icon-action-redo"></i>
                        <span class="title">Clients</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                    </a>
                </li>
                <li class="nav-item <?php if ($controller_name == 'competitor'  && $method_name == 'index') { ?> menu_active<?php } ?>" >
                    <a href="<?php echo $base_url; ?>competitor" class="nav-link ">
                        <i class="icon-puzzle"></i>
                        <span class="title">Competitor</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                    </a>
                </li>
                <li class="nav-item <?php if ($controller_name == 'competitor'  && $method_name == 'view_rank') { ?> menu_active<?php } ?>">
                    <a href="<?php echo $base_url; ?>competitor/view_rank" class="nav-link ">
                        <i class="icon-list"></i>  
                        <span class="title">All Competitor Ranks</span> <!-- [Firm admin] --> <!-- [Attorney] -->
                    </a>
                </li>
                <li class="nav-item <?php if ($controller_name == 'attorney_goals') { ?> menu_active<?php } ?>" >
                    <a href="<?php echo $base_url; ?>attorney-goals" class="nav-link ">
                        <i class="icon-puzzle"></i>
                        <span class="title">My Goals</span> <!-- [Site admin] --> <!-- [Attorney] -->
                    </a>
                </li>
                <li class="nav-item <?php if ($controller_name == 'activity') { ?> menu_active<?php } ?>" >
                    <a href="<?php echo $base_url; ?>activity" class="nav-link ">
                        <i class=" icon-puzzle"></i>
                        <span class="title">Activity</span> <!-- [Site admin] -->  <!-- [Attorney] -->
                    </a>
                </li>
                <li class="nav-item <?php if ($controller_name == 'activity_budget_report') { ?> menu_active<?php } ?>" >
                    <a href="<?php echo $base_url; ?>activity-budget-report" class="nav-link ">
                        <i class=" icon-puzzle"></i>
                        <span class="title">Activity Budget Report</span>  <!-- [Firm admin] --> <!-- [Attorney] -->
                    </a>
                </li>
                <?php if ($approver) { ?>
                    <li class="nav-item <?php if ($controller_name == 'activity_approvals') { ?> menu_active<?php } ?>" >
                        <a href="<?php echo $base_url; ?>activity-approvals" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title">Activity Approvals</span> <!-- [Site admin] --> <!-- [Attorney : View] -->
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>

<div id="chngpass_responsive"  class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <form action="<?php echo $base_url . 'dashboard/change-password/' . base64_encode($admin_id); ?>" name="change_password_form" id="change_password_form" method="post">
                <div class="modal-body">
                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Old Password</label>
                                    <input type="password" placeholder="**********" class="form-control" name="password" id="password"/> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="password" placeholder="**********" class="form-control" name="new_pass" id="new_pass"/> 
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Confirm New Password</label>
                                    <input type="password" placeholder="***********" class="form-control" name="con_pass" id="con_pass"/> 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <button type="submit" class="btn green" name="change_password_submit" id="change_password_submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="super_user_login"  class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Login As Super User</h4>
            </div>
            <form action="<?php echo $base_url . 'super-admin/login/'; ?>" name="superadmin_form" id="superadmin_form" method="post">
                <div class="modal-body">
                    <div class="scroller" style="height:400px" data-always-visible="1" data-rail-visible1="1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Select Firm</label>
                                    <select class="form-control" name="firm">
                                        <option value="">Select One</option>
                                        <?php foreach ($all_firms as $key => $value) {
                                            $value = (array) $value;
                                            ?>
                                            <option value="<?php echo $value['firm_admin_seq_no']; ?>"><?php echo $value['firm_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <input type="text"  name="username" class="form-control" placeholder="Enter Username" id="username">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">password</label>
                                    <input type="password"  name="password" id="password" class="form-control" placeholder="********">
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <button type="submit" class="btn green" name="superadmin_submit" id="superadmin_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
        
    <!--<script type="text/javascript" src="<?php echo $base_url ?>assets/custom/js/validate/firm_codes_add.js"></script>-->

</div>