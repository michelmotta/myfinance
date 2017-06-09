<?php
  use Cake\Routing\Router;
?>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="widget-small primary" style="background: #46a149;"><i class="icon fa fa-money fa-3x"></i>
          <div class="info">
            <h4>Revenues</h4>
            <p><b id="totalRevenue"></b></p>
          </div>
        </div>
        <div class="widget-small primary"><i class="icon fa fa-diamond fa-3x"></i>
          <div class="info">
            <h4>Montly Revenues</h4>
            <p><b id="montlyRevenue"></b></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="widget-small warning"><i class="icon fa fa-shopping-cart fa-3x"></i>
          <div class="info">
            <h4>Expenses</h4>
            <p><b id="totalExpense"></b></p>
          </div>
        </div>
        <div class="widget-small danger"><i class="icon fa fa-credit-card fa-3x"></i>
          <div class="info">
            <h4>Montly Expenses</h4>
            <p><b id="montlyExpense"></b></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <div id="revenues" style="min-width: 310px; height: 400px; margin: 0 auto">
          <div class="cssload-loader">
            <div class="cssload-inner cssload-one"></div>
            <div class="cssload-inner cssload-two"></div>
            <div class="cssload-inner cssload-three"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div id="pie1" style="height: 400px; max-width: 100%; margin: 0 auto"></div>
      </div>    
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div id="pie2" style="height: 400px; max-width: 100%; margin: 0 auto"></div>
      </div>    
    </div>
  </div>
</div>


<script type="text/javascript">
function anualValues(data) {
  Highcharts.chart('revenues', {
    title: {
        text: 'Monthly Average Revenues and Expenses',
        x: -20 //center
    },
    subtitle: {
        text: 'Source: Myfinance2017',
        x: -20
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Values (R$)'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },
    tooltip: {
        valuePrefix: 'R$ '
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
    },
    series: [{
        name: 'Revenues',
        data: data.Revenues.data
    }, {
        name: 'Expenses',
        data: data.Expenses.data
    }]
  });

}
function totalByRevenueCategory(data) {

  Highcharts.chart('pie1', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Receitas por categorias'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    series: [{
        name: 'Porcentagem',
        colorByPoint: true,
        data: data
    }]
  });
}

function totalByExpenseCategory(data) {

  Highcharts.chart('pie2', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Gastos por categorias'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    series: [{
        name: 'Porcentagem',
        colorByPoint: true,
        data: data
    }]
  });
}

$(document).ready(function() {
  $.ajax({
    url: '<?php echo Router::url(array('controller' => 'Revenues', 'action' => 'anualValues'));?>',
    type: 'GET',
    async: true,
    dataType: "json",
    success: function (data) {
      var series = [];
      jQuery.each(data.dataFinal, function(i, val) {
        series[i] = {
          data: val
        };
      });
      anualValues(series);
    }
  });

  $.ajax({
    url: '<?php echo Router::url(array('controller' => 'Categories', 'action' => 'totalByRevenueCategory'));?>',
    type: 'GET',
    async: true,
    dataType: "json",
    success: function (data) {
      totalByRevenueCategory(data);
    }
  });

  $.ajax({
    url: '<?php echo Router::url(array('controller' => 'Categories', 'action' => 'totalByExpenseCategory'));?>',
    type: 'GET',
    async: true,
    dataType: "json",
    success: function (data) {
      totalByExpenseCategory(data);
    }
  });
});
</script>

<script type="text/javascript">
  $( document ).ready(function() {
    totalRevenues();
    totalExpenses();
    montlyExpenses();
    montlyRevenues();
  });
  function totalRevenues(){
    $.ajax({
        type:"POST",
        url:"<?php echo Router::url(array('controller' => 'Revenues', 'action' => 'totalrevenues'));?>",
        success: function(data){
            $('#totalRevenue').append(data);
        },
        error: function () {
            alert('error');
        }
    });
  }
  function totalExpenses(){
    $.ajax({
        type:"POST",
        url:"<?php echo Router::url(array('controller' => 'Expenses', 'action' => 'totalexpenses'));?>",
        success: function(data){
            $('#totalExpense').append(data);
        },
        error: function () {
            alert('error');
        }
    });
  }
  function montlyExpenses(){
    $.ajax({
        type:"POST",
        url:"<?php echo Router::url(array('controller' => 'Expenses', 'action' => 'montlyexpenses'));?>",
        success: function(data){
            $('#montlyExpense').append(data);
        },
        error: function () {
            alert('error');
        }
    });
  }
  function montlyRevenues(){
    $.ajax({
      type:"POST",
      url:"<?php echo Router::url(array('controller' => 'Revenues', 'action' => 'montlyrevenues'));?>",
      success: function(data){
          $('#montlyRevenue').append(data);
      },
      error: function () {
          alert('error');
      }
    });
  }
</script>
