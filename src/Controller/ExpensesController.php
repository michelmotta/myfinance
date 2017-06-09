<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Expenses Controller
 *
 * @property \App\Model\Table\ExpensesTable $Expenses
 */
class ExpensesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $data = $this->DataTables->find('Expenses', 'all', [
            'contain' => ['Categories'],
            'order' => ['id' => 'DESC']
        ]);
        $this->set('data', $data);
        $this->set('_serialize', array_merge($this->viewVars['_serialize'], ['data']));
    }

    /**
     * View method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('expense', $expense);
        $this->set('_serialize', ['expense']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expense = $this->Expenses->newEntity();
        if ($this->request->is('post')) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->data);
            if ($this->Expenses->save($expense)) {
                $this->Flash->success(__('The expense has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expense could not be saved. Please, try again.'));
        }
        $categories = $this->Expenses->Categories->find('list', ['limit' => 200])
            ->where(['type' => 'expense']);
            
        $this->set(compact('expense', 'categories'));
        $this->set('_serialize', ['expense']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expense = $this->Expenses->get($id, [
            'contain' => ['Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expense = $this->Expenses->patchEntity($expense, $this->request->data);
            if ($this->Expenses->save($expense)) {
                $this->Flash->success(__('The expense has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expense could not be saved. Please, try again.'));
        }
        $categories = $this->Expenses->Categories->find('list', ['limit' => 200]);
        $this->set(compact('expense', 'categories'));
        $this->set('_serialize', ['expense']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expense id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expense = $this->Expenses->get($id);
        if ($this->Expenses->delete($expense)) {
            $this->Flash->success(__('The expense has been deleted.'));
        } else {
            $this->Flash->error(__('The expense could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function totalexpenses()
    { 
        $allData = $this->Expenses->find('all');
        $totalExpenses = 0;
        foreach ($allData as $data) {
            $totalExpenses = $totalExpenses + $data->value;
        }
        $this->set('totalExpenses', $totalExpenses);
    }

    public function montlyexpenses()
    { 
        $allData = $this->Expenses->find();
        $allData->where(['MONTH(Expenses.date)' => date('n'), 'YEAR(Expenses.date)' => date('Y')]);

        $montlyExpenses = 0;
        foreach ($allData as $data) {
            $montlyExpenses = $montlyExpenses + $data->value;
        }
        $this->set('montlyExpenses', $montlyExpenses);
    }
}
