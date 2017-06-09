<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>
    function myLinkBuilder (data, type, full, meta, edit, editUrl, view, viewUrl) {
        return '<div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs">Select <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="' + viewUrl + '/' + data + '">' + view + '</a></li><li><a href="' + editUrl + '/' + data + '">' + edit + '</a></li></ul>';
    }
</script>
<div class="card">
    <div class="card-body">
        <nav>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-primary pull-right']) ?>
        </nav>
        <div class="categories index large-9 medium-8 columns content">
            <h3><?= __('Users') ?></h3>
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
                    'name' => 'Users.id',
                    'data' => 'id',
                    'searchable' => false,
                ],
                [
                    'title' => __('Username'),
                    'name' => 'Users.username',
                    'data' => 'username'
                ],
                [
                    'title' => __('Created'),
                    'name' => 'Users.created',
                    'data' => 'created',
                    'render' => $this->DataTables->callback('$.fn.dataTable.render.intlDateTime("pt-BR")')
                ],
                [
                    'title' => __('Modified'),
                    'name' => 'Users.modified',
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