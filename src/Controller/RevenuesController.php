<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Revenues Controller
 *
 * @property \App\Model\Table\RevenuesTable $Revenues
 */
class RevenuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
         $data = $this->DataTables->find('Revenues', 'all', [
            'contain' => ['Categories'],
            'order' => ['id' => 'DESC']
        ]);
        $this->set('data', $data);
        $this->set('_serialize', array_merge($this->viewVars['_serialize'], ['data']));
    }

    /**
     * View method
     *
     * @param string|null $id Revenue id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $revenue = $this->Revenues->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('revenue', $revenue);
        $this->set('_serialize', ['revenue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $revenue = $this->Revenues->newEntity();
        if ($this->request->is('post')) {
            $revenue = $this->Revenues->patchEntity($revenue, $this->request->data);
            if ($this->Revenues->save($revenue)) {
                $this->Flash->success(__('The revenue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The revenue could not be saved. Please, try again.'));
        }
        $categories = $this->Revenues->Categories->find('list', ['limit' => 200])
            ->where(['type' => 'revenue']);

        $this->set(compact('revenue', 'categories'));
        $this->set('_serialize', ['revenue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Revenue id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $revenue = $this->Revenues->get($id, [
            'contain' => ['Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $revenue = $this->Revenues->patchEntity($revenue, $this->request->data);
            if ($this->Revenues->save($revenue)) {
                $this->Flash->success(__('The revenue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The revenue could not be saved. Please, try again.'));
        }
        $categories = $this->Revenues->Categories->find('list', ['limit' => 200]);
        $this->set(compact('revenue', 'categories'));
        $this->set('_serialize', ['revenue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Revenue id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $revenue = $this->Revenues->get($id);
        if ($this->Revenues->delete($revenue)) {
            $this->Flash->success(__('The revenue has been deleted.'));
        } else {
            $this->Flash->error(__('The revenue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function totalrevenues()
    {
        $allData = $this->Revenues->find('all');
        $totalRevenues = 0;
        foreach ($allData as $data) {
            $totalRevenues = $totalRevenues + $data->value;
        }
        $this->set('totalRevenues', $totalRevenues);
    }

    public function montlyrevenues()
    {

        $allData = $this->Revenues->find();
        $allData->where(['MONTH(Revenues.date)' => date('n'), 'YEAR(Revenues.date)' => date('Y')]);

        $montlyRevenues = 0;
        foreach ($allData as $data) {
            $montlyRevenues = $montlyRevenues + $data->value;
        }
        $this->set('montlyRevenues', $montlyRevenues);
    }

    public function anualValues()
    {
        $dataMonthsRevenues = $this->Revenues->find()
            ->select(['value' => 'SUM(value)'])
            ->where(['YEAR(date)' => date('Y')])
            ->group('MONTH(date)');

        $temp1 = array();
        foreach ($dataMonthsRevenues as $value) {
            array_push($temp1, $value->value);
        }

        $this->loadModel('Expenses');
        $dataMonthsExpenses = $this->Expenses->find()
            ->select(['value' => 'SUM(value)'])
            ->where(['YEAR(date)' => date('Y')])
            ->group('MONTH(date)');

        $temp2 = array();
        foreach ($dataMonthsExpenses as $value) {
            array_push($temp2, $value->value);
        }

        $dataFinal = array('Revenues' => $temp1, 'Expenses' => $temp2);

        $this->set(compact('dataFinal'));
    }
}
