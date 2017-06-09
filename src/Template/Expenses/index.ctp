<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>
    function myLinkBuilder (data, type, full, meta, edit, editUrl, view, viewUrl) {
        return '<div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs">Select <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="' + viewUrl + '/' + data + '">' + view + '</a></li><li><a href="' + editUrl + '/' + data + '">' + edit + '</a></li></ul>';
    }
    function receiptLinkBuilder (data, type, full, meta) {
        if(data != null){
            return '<a href="webroot/files/Expenses/receipt' + '/' + data + '" data-lity>Receipt</a>';
        }else{
            return '';
        }
        
    }
    dt.render.date = function (data, type, full, meta)
    {
        if (type === 'display') {
            var date = new Date(data);
            return date.toLocaleDateString("pt-BR");
        }
        return data;
    };
</script>
<div class="card">
    <div class="card-body">
        <nav>
            <?= $this->Html->link(__('New Expense'), ['action' => 'add'], ['class' => 'btn btn-primary pull-right']) ?>
        </nav>
        <div class="categories index large-9 medium-8 columns content">
            <h3><?= __('Expenses') ?></h3>
        <?php
        $options = [
            'responsive' => true,
            'ajax' => [
                'url' => $this->Url->build() // current controller, action, params
            ],
            'data' => $data,
            'deferLoading' => $data->count(), // https://datatables.net/reference/option/deferLoading
            'columns' => [
                [   
                    'title' => __('Id'),
                    'name' => 'Expenses.id',
                    'data' => 'id',
                    'searchable' => false,
                ],
                [
                    'title' => __('Name'),
                    'name' => 'Expenses.name',
                    'data' => 'name'
                ],
                [
                    'title' => __('Value'),
                    'name' => 'Expenses.value',
                    'data' => 'value',
                    'render' => $this->DataTables->callback('$.fn.dataTable.render.number( ".", ",", 2, "R$ " )'),
                ],
                [
                    'title' => __('Date'),
                    'name' => 'Expenses.date',
                    'data' => 'date',
                    'render' => $this->DataTables->callback('$.fn.dataTable.render.intlDateTime("pt-BR")')
                ],
                [
                    'title' => __('Receipt'),
                    'name' => 'Expenses.receipt',
                    'data' => 'receipt',
                    'sortable' => false,
                    'searchable' => false,
                    'render' => $this->DataTables->callback('receiptLinkBuilder')
                ],
                [
                    'title' => __('Modified'),
                    'name' => 'Expenses.modified',
                    'data' => 'modified',
                    'render' => $this->DataTables->callback('$.fn.dataTable.render.intlDateTime("pt-BR")')
                ],
                [
                    'title' => __('Actions'),
                    'data' => 'id',
                    'sortable' => false,
                    'searchable' => false,
                    'render' => $this->DataTables->callback('myLinkBuilder', [__('Edit'), $this->Url->build(['action' => 'edit']), __('View'), $this->Url->build(['action' => 'view'])]),
                ],
            ],
            'order' => [0, 'DESC'], // order by id
        ];
        echo $this->DataTables->table('categories-table', $options, ['class' => 'table teste']);
        ?>
    </div>
</div>