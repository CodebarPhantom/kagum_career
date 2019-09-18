<?php
    $user_id = $this->session->userdata('iduser');
    $user_na = $this->session->userdata('user_name');  
    $user_em = $this->session->userdata('user_email');    
    $user_le = $this->session->userdata('user_level');

    

    if (empty($user_id && $user_na && $user_le)) {
        redirect(base_url(), 'refresh');
    }

$tk_c = $this->router->class;
$tk_m = $this->router->method;

?>
<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

<!-- Sidebar mobile toggler -->
<div class="sidebar-mobile-toggler text-center">
    <a href="#" class="sidebar-mobile-main-toggle">
        <i class="icon-arrow-left8"></i>
    </a>
    Navigation
    <a href="#" class="sidebar-mobile-expand">
        <i class="icon-screen-full"></i>
        <i class="icon-screen-normal"></i>
    </a>
</div>
<!-- /sidebar mobile toggler -->


<!-- Sidebar content -->
<div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user">
        <div class="card-body">
            <div class="media">
                <div class="mr-3">
                    <a href="#"><img src="<?php echo base_url();?>assets/backend/global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
                </div>

                <div class="media-body">
                    <div class="media-title font-weight-semibold"><?php echo $user_na; ?></div>
                    <div class="font-size-xs opacity-50">
                        <i class="icon-vcard font-size-sm"></i> &nbsp;
                            <?php if ($user_le == '1'){
                                echo "Superadmin";
                            }else if ($user_le == '2'){
                                echo "Manager";
                            }else if ($user_le == '3'){
                                echo "Staff";
                            } ?>
                    </div>
                </div>

                <div class="ml-3 align-self-center">
                    <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <!-- Main -->
            
            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
            
            <?php if ($user_le === '1' || $user_le === '2' || $user_le === '3') {?>
            <li class="nav-item">
                <a href="<?=base_url()?>hradmin" class="nav-link <?php if ($tk_m == 'index') { ?><?php echo 'active'; } ?>">
                    <i class="icon-home4"></i>
                    <span>
                        <?php echo $lang_dashboard; ?>
                    </span>
                </a>
            </li>
            <?php } ?>
            
            <?php if ($user_le === '1' || $user_le == '2' ) {?>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-user-tie "></i> <span><?php echo $lang_applicant; ?></span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                    <li class="nav-item"><a href="#" class="nav-link "><?php echo $lang_list_applicants; ?></a></li>                    
                </ul>
            </li>
            <?php } ?>

            <?php if ($user_le === '1' || $user_le === '2' || $user_le === '3') {?>
            <li class="nav-item nav-item-submenu <?php if ($tk_m == 'list_city' ) { ?><?php echo 'nav-item-open'; } else { echo '';} ?>">
                <a href="#" class="nav-link"><i class="icon-city"></i> <span><?php echo $lang_city; ?></span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Layouts" <?php if ($tk_m == 'list_city') { ?>  <?php echo 'style="display: block;"'; } else { echo 'style="display: none;"';} ?>>
                    <li class="nav-item"><a href="<?=base_url()?>hradmin/list-city" class="nav-link <?php if ($tk_m == 'list_city') { ?>  <?php echo 'active'; } ?>" ><?php echo $lang_list_city; ?></a></li>                                      
                </ul>
            </li>
            <?php } ?>

            <?php if ($user_le === '1' || $user_le === '2' || $user_le === '3') {?>
            <li class="nav-item nav-item-submenu <?php if ($tk_m == 'list_departement' ) { ?><?php echo 'nav-item-open'; } else { echo '';} ?>">
                <a href="#" class="nav-link"><i class="icon-tree6"></i> <span><?php echo $lang_departement; ?></span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Layouts" <?php if ($tk_m == 'list_departement') { ?>  <?php echo 'style="display: block;"'; } else { echo 'style="display: none;"';} ?>>
                    <li class="nav-item"><a href="<?=base_url()?>hradmin/list-departement" class="nav-link <?php if ($tk_m == 'list_departement') { ?>  <?php echo 'active'; } ?>" ><?php echo $lang_list_departement; ?></a></li>                                      
                </ul>
            </li>
            <?php } ?>

            <?php if ($user_le === '1' || $user_le === '2' || $user_le === '3') {?>
            <li class="nav-item nav-item-submenu <?php if ($tk_m == 'list_hotel' ) { ?><?php echo 'nav-item-open'; } else { echo '';} ?>">
                <a href="#" class="nav-link"><i class="icon-office"></i> <span><?php echo $lang_hotel; ?></span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Layouts" <?php if ($tk_m == 'list_hotel') { ?>  <?php echo 'style="display: block;"'; } else { echo 'style="display: none;"';} ?>>
                    <li class="nav-item"><a href="<?=base_url()?>hradmin/list-hotel" class="nav-link <?php if ($tk_m == 'list_hotel') { ?>  <?php echo 'active'; } ?>"><?php echo $lang_list_hotels; ?></a></li>                                      
                </ul>
            </li>
            <?php } ?>

            <?php if ($user_le === '1' || $user_le === '2' || $user_le === '3') {?>
            <li class="nav-item nav-item-submenu <?php if ($tk_m == 'list_jobtitle' ) { ?><?php echo 'nav-item-open'; } else { echo '';} ?>">
                <a href="#" class="nav-link"><i class="icon-medal2"></i> <span><?php echo $lang_job_title; ?></span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Layouts" <?php if ($tk_m == 'list_jobtitle') { ?>  <?php echo 'style="display: block;"'; } else { echo 'style="display: none;"';} ?>>
                   <li class="nav-item"><a href="<?=base_url()?>hradmin/list-jobtitle" class="nav-link <?php if ($tk_m == 'list_jobtitle') { ?>  <?php echo 'active'; } ?>"><?php echo $lang_list_job_titles; ?></a></li>                                      
                </ul>
            </li>
            <?php } ?>

            <?php if ($user_le === '1' ) {?>
            <li class="nav-item nav-item-submenu <?php if ($tk_m == 'list_users' /*AND 'add_user'*/) { ?><?php echo 'nav-item-open'; } else { echo '';} ?> ">
                <a href="#" class="nav-link"><i class="icon-users2"></i> <span><?php echo $lang_user; ?></span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Layouts" <?php if ($tk_m == 'list_users') { ?>  <?php echo 'style="display: block;"'; } else { echo 'style="display: none;"';} ?>>
                    <!--<li class="nav-item"><a href="<?//=base_url()?>admin/add_user" class="nav-link <?php //if ($tk_m == 'add_user') { ?>  <?php //echo 'active'; } ?>"><?php //echo $lang_add_user; ?></a></li> --> 
                    <li class="nav-item"><a href="<?=base_url()?>hradmin/list-users" class="nav-link <?php if ($tk_m == 'list_users') { ?>  <?php echo 'active'; } ?>"><?php echo $lang_list_users; ?></a></li>                                      
                </ul>
            </li>
            <?php } ?>

            <?php if ($user_le === '1' || $user_le === '2' || $user_le === '3') {?>
            <li class="nav-item nav-item-submenu <?php if ($tk_m == 'list_vacancy' || $tk_m == 'add_vacancy' || $tk_m == 'update_vacancy') { ?><?php echo 'nav-item-open'; } else { echo '';} ?>">
                <a href="#" class="nav-link"><i class="icon-magazine"></i> <span><?php echo $lang_vacancy; ?></span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Layouts"  <?php if ($tk_m == 'list_vacancy' || $tk_m == 'add_vacancy' || $tk_m == 'update_vacancy') { ?>  <?php echo 'style="display: block;"'; } else { echo 'style="display: none;"';} ?>>
                    <li class="nav-item"><a href="<?=base_url()?>hradmin/add-vacancy" class="nav-link <?php if ($tk_m == 'add_vacancy') { ?>  <?php echo 'active'; } ?>"><?php echo $lang_add_vacancy; ?></a></li>  
                    <li class="nav-item"><a href="<?=base_url()?>hradmin/list-vacancy" class="nav-link <?php if ($tk_m == 'list_vacancy' || $tk_m == 'update_vacancy')  { ?>  <?php echo 'active'; } ?>"><?php echo $lang_list_vacancy; ?></a></li>                                      
                </ul>
            </li>
            <?php } ?>
            

            <?php if ($user_le === '1') {?>
            <li class="nav-item nav-item-submenu">
                <a href="#" class="nav-link"><i class="icon-cog4 spinner"></i> <span><?php echo $lang_setting; ?></span></a>
                <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                    <li class="nav-item"><a href="#" class="nav-link"><?php echo $lang_site_setting; ?></a></li>                    
                </ul>
            </li>
            <?php } ?>
            
            
            
            <!-- /page kits -->

        </ul>
    </div>
    <!-- /main navigation -->

</div>
<!-- /sidebar content -->

</div>
<!-- /main sidebar -->