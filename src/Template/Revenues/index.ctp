<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>
    function myLinkBuilder (data, type, full, meta, edit, editUrl, view, viewUrl) {
        return '<div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs">Select <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="' + viewUrl + '/' + data + '">' + view + '</a></li><li><a href="' + editUrl + '/' + data + '">' + edit + '</a></li></ul>';
    }
    function verify (data, type, full, meta) {
        if(data == 'revenue'){
            return '<span class="label label-success">' + data + '</span>';
        }else{
            return '<span class="label label-warning">' + data + '</span>';
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
            <?= $this->Html->link(__('New Revenue'), ['action' => 'add'], ['class' => 'btn btn-primary pull-right']) ?>
        </nav>
        <div class="categories index large-9 medium-8 columns content">
            <h3><?= __('Revenues') ?></h3>
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
                    'name' => 'Revenues.id',
                    'data' => 'id',
                    'searchable' => false,
                ],
                [
                    'title' => __('Name'),
                    'name' => 'Revenues.name',
                    'data' => 'name'
                ],
                [
                    'title' => __('Value'),
                    'name' => 'Revenues.value',
                    'data' => 'value',
                    'render' => $this->DataTables->callback('$.fn.dataTable.render.number( ".", ",", 2, "R$ " )'),
                ],
                [
                    'title' => __('Date'),
                    'name' => 'Revenues.date',
                    'data' => 'date',
                    'render' => $this->DataTables->callback('$.fn.dataTable.render.intlDateTime("pt-BR")')
                ],
                [
                    'title' => __('Modified'),
                    'name' => 'Revenues.modified',
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
        echo $this->DataTables->table('categories-table', $options, ['class' => 'table']);
        ?>
    </div>
</div>
