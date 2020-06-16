<?php 
  $linkDashBoard = URL::createLink('admin','index','dashboard');
  $linkGroupList = URL::createLink('admin','group','list');
  $linkGroupForm = URL::createLink('admin','group','form');
  $arrMenu = [
    'dashboard' => ['icon' => 'fa-tachometer-alt','name'=>'Dashboard','link'=>$linkDashBoard],
    'group' => ['icon' => 'fa-copy','name'=>'Group','link'=>$linkDashBoard,'child' => [
        ['icon' => 'fa-circle','name'=>'List','link'=>$linkGroupList],
        ['icon' => 'fa-circle','name'=>'Add','link'=>$linkGroupForm]
      ]
    ]
  ];
  $xhtml = '';
  foreach ($arrMenu as $key => $value) {
    $arrow = '';
    if(isset($value['child'])) {
      $arrow = 'fas fa-angle-left right';
    }
    $xhtml .= '<li class="nav-item has-treeview">
            <a href="'.$value['link'].'" class="nav-link">
              <i class="nav-icon fas '.$value['icon'].'"></i>
              <p>
                '.ucfirst($key).'
                <i class="'.$arrow.'"></i>
              </p>
            </a>';
    if(!empty($value['child'])) {
      foreach ($value['child'] as $key02 => $value02) {
        $xhtml .= '<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="'.$value02['link'].'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>'.$value02['name'].'</p>
                </a>
              </li>
            </ul>';
      }
    }        
    $xhtml .= '</li>';

  }
  
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="public/template/admin/adminlte/css/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://crhscountyline.com/wp-content/uploads/2020/03/Capture.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Hai Dep Trai</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php echo $xhtml; ?>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="<?php // echo $linkDashBoard ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Group
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php// echo $linkGroupList ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php// echo $linkGroupForm ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>