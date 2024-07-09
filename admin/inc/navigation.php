
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-light elevation-4 sidebar-no-expand bg-gradient-navy">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link bg-transparent text-sm shadow-sm bg-gradient-navy">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 10px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child text-dark" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="./" class="nav-link text-light nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url ?>admin/?page=journals" class="nav-link text-light nav-journals">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                          Journal Entries
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">Report</li>
                    <li class="nav-item">
                      <a href="<?php echo base_url ?>admin/?page=reports/working_trial_balance" class="nav-link text-light nav-reports_working_trial_balance">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                          Trial Balance
                        </p>
                      </a>
                    </li>
                    <li class="nav-header">More Info</li>
                    <li class="nav-item">
                      <a href="<?php echo base_url ?>admin/?page=about_us/about_us" class="nav-link text-light nav-about_us">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                          About Us
                        </p>
                      </a>
                    </li>

                    <?php if($_settings->userdata('type') == 1): ?>
                    <li class="nav-header">Maintenance</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=groups" class="nav-link text-light nav-groups">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Chart account List
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=accounts" class="nav-link text-light nav-accounts">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                          Journal List
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link text-light nav-user_list">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                          User List
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link text-light nav-system_info">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Settings
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>

                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
<script>
  var page;
  $(document).ready(function(){
    page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    page = page.replace(/\//gi,'_');

    if($('.nav-link.nav-'+page).length > 0){
      $('.nav-link.nav-'+page).addClass('active')
      $('.nav-link.nav-'+page).removeClass('text-light text-dark text-primary')
      $('.nav-link.nav-'+page).addClass('text-reset')
      if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
        $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
        $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').removeClass('text-light text-dark text-primary')
        $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('text-reset')
        $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
      }
      if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
        $('.nav-link.nav-'+page).parent().addClass('menu-open')
      }
    }
  })
</script> 