<section class="sidebar">
  <div class="user-panel">
    <center><?php echo $this->Html->image('shield-ok-icon.png', ['alt' => 'Shield', 'width' => '100']); ?></center>
  </div>
  <!-- Sidebar Menu-->
  <ul class="sidebar-menu">
    <?php if($this->request->params['controller'] == 'Pages') $class = 'active'; else $class = ''; ?>
    <li class="<?= $class ?>">
      <?= $this->Html->link(__('<i class="fa fa-dashboard"></i><span>Dashboard</span>') ,['controller' => 'Pages', 'action' => 'display'], ['escape' => false]) ?>
    </li>
    <?php if($this->request->params['controller'] == 'Revenues') $class = 'active'; else $class = ''; ?>
    <li class="<?= $class ?>">
      <?= $this->Html->link(__('<i class="fa fa-money"></i><span>Revenues</span>') ,['controller' => 'Revenues', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <?php if($this->request->params['controller'] == 'Expenses') $class = 'active'; else $class = ''; ?>
    <li class="<?= $class ?>">
      <?= $this->Html->link(__('<i class="fa fa-shopping-cart"></i><span>Expenses</span>') ,['controller' => 'Expenses', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <?php if($this->request->params['controller'] == 'Categories') $class = 'active'; else $class = ''; ?>
    <li class="<?= $class ?>">
      <?= $this->Html->link(__('<i class="fa fa-bookmark-o"></i><span>Categories</span>') ,['controller' => 'Categories', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <?php if($this->request->params['controller'] == 'Users') $class = 'active'; else $class = ''; ?>
    <li class="<?= $class ?>">
      <?= $this->Html->link(__('<i class="fa fa-users"></i><span>Users</span>') ,['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?>
    </li>
    <li class="treeview"><a href="#"><i class="fa fa-share"></i><span>MultiLavel Menu</span><i class="fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="blank-page.html"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i><span> Level One</span><i class="fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="blank-page.html"><i class="fa fa-circle-o"></i> Level Two</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i><span> Level Two</span></a></li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</section>