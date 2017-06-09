<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $data = $this->DataTables->find('Categories', 'all', [
            'order' => ['id' => 'DESC']
        ]);
        $this->set('data', $data);
        $this->set('_serialize', array_merge($this->viewVars['_serialize'], ['data']));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Expenses', 'Revenues']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $expenses = $this->Categories->Expenses->find('list', ['limit' => 200]);
        $revenues = $this->Categories->Revenues->find('list', ['limit' => 200]);
        $this->set(compact('category', 'expenses', 'revenues'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Expenses', 'Revenues']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $expenses = $this->Categories->Expenses->find('list', ['limit' => 200]);
        $revenues = $this->Categories->Revenues->find('list', ['limit' => 200]);
        $this->set(compact('category', 'expenses', 'revenues'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function totalByRevenueCategory()
    {
        
        $this->autoRender = false;
        $data = $this->Categories->find()
        ->select([
            'name' =>'Categories.name',
            'y' => 'SUM(revenues.value)'
         ])
        ->leftJoin('revenues_categories', 'Categories.id = revenues_categories.category_id')
        ->leftJoin('revenues', 'revenues_categories.revenue_id = revenues.id')
        ->where(['Categories.type' => 'revenue'])
        ->group('Categories.id');

        $this->response->type('json');
        $json = json_encode($data, JSON_NUMERIC_CHECK);
        $this->response->body($json);

    }

    public function totalByExpenseCategory()
    {
        
        $this->autoRender = false;
        $data = $this->Categories->find()
        ->select([
            'name' =>'Categories.name',
            'y' => 'SUM(expenses.value)'
         ])
        ->leftJoin('expenses_categories', 'Categories.id = expenses_categories.category_id')
        ->leftJoin('expenses', 'expenses_categories.expense_id = expenses.id')
        ->where(['Categories.type' => 'expense'])
        ->group('Categories.id');

        $this->response->type('json');
        $json = json_encode($data, JSON_NUMERIC_CHECK);
        $this->response->body($json);

    }
}
