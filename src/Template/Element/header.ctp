<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button--><a href="#" data-toggle="offcanvas" class="sidebar-toggle"></a>
  <!-- Navbar Right Menu-->
  <div class="navbar-custom-menu">
    <ul class="top-nav">
      <!--Notification Menu-->
      <li class="dropdown notification-menu"><a href="#" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bell-o fa-lg"></i></a>
        <ul class="dropdown-menu">
          <li class="not-head">You have 4 new notifications.</li>
          <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
              <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
          <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
              <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
          <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
              <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
          <li class="not-footer"><a href="#">See all notifications.</a></li>
        </ul>
      </li>
      <!-- User Menu-->
      <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu">
          <li>
            <?php $userId = $this->request->session()->read('Auth.User.id'); ?>
            <?= $this->Html->link(__('<i class="fa fa-user fa-lg"></i> Profile') ,['controller' => 'Users', 'action' => 'view', $userId], ['escape' => false]) ?>
          </li>
          <li>
            <?= $this->Html->link(__('<i class="fa fa-sign-out fa-lg"></i> Logout') ,['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>