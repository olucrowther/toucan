<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_img">  </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> 
            <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Toucan Demo update</span> </a>
            <div class="nav_list"> 
                <!--<a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>--> 
                <a href="<?php echo base_url('member-form'); ?>" class="nav_link <?php echo (@$page_link == 'member-form')? 'active' : ''; ?>"> <i class='bx bx-user-plus nav_icon'></i> <span class="nav_name">Add Member</span> </a> 

                <a href="<?php echo base_url('member-list'); ?>" class="nav_link <?php echo (@$page_link == 'member-list')? 'active' : ''; ?>"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Members</span> </a>

                <a href="<?php echo base_url('school-list'); ?>" class="nav_link <?php echo (@$page_link == 'school-list')? 'active' : ''; ?>"> <i class='bx bx-building nav_icon'></i> <span class="nav_name">Schools</span> </a>
                
                <a href="<?php echo base_url('member-chart'); ?>" class="nav_link <?php echo (@$page_link == 'member-chart')? 'active' : ''; ?>"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Chart</span> </a> 
            </div>
        </div> <a href="<?php echo base_url('logout'); ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
</div>
