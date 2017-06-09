<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Routing\Router;
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('lity.min.css') ?>
    <?= $this->Html->script('jquery-2.1.4.min') ?>
    <?= $this->Html->script('lity.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('DataTables.cakephp.dataTables') ?>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.13/r-2.1.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.13/r-2.1.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.13/dataRender/intl.js"></script>
</head>
<body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a href="index.html" class="logo">Myfinance2017</a>
        <?= $this->element('header');?>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <?= $this->element('side');?>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> <?= $this->request->params['controller']; ?></h1>
            <p>Suas Finanças Sob Controle</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Blank Page</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.js"></script>
    <?= $this->Html->script('essential-plugins') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('/js/plugins/pace.min') ?>
    <?= $this->Html->script('/js/plugins/bootstrap-datepicker.min') ?>
    <?= $this->Html->script('/js/plugins/bootstrap-datepicker.pt-BR') ?>
    <?= $this->Html->script('/js/plugins/select2.min') ?>
    <?= $this->Html->script('/js/plugins/bootstrap-notify.min') ?>
    <?= $this->Html->script('main') ?>
    <script type="text/javascript">
      $( document ).ready(function() {
        $('#demoDate').datepicker({
          language: "pt-BR",
          format: "dd/mm/yy",
          autoclose: true,
          todayHighlight: true
        });
        $(function() {
          $('#currency').mask('#.##0,00', {reverse: true});
        });
        $('#demoSelect').select2({
          placeholder: 'Select an option',
          multiple: true
        });
      });
    </script>
  </body>    
</html>