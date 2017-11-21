<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShowTimes Controller
 *
 *
 * @method \App\Model\Entity\ShowTime[] paginate($object = null, array $settings = [])
 */
class ShowTimesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $showTimes = $this->paginate($this->ShowTimes);

        $this->set(compact('showTimes'));
        $this->set('_serialize', ['showTimes']);
    }

    /**
     * View method
     *
     * @param string|null $id Show Time id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $showTime = $this->ShowTimes->get($id, [
            'contain' => []
        ]);

        $this->set('showTime', $showTime);
        $this->set('_serialize', ['showTime']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $showTime = $this->ShowTimes->newEntity();
        if ($this->request->is('post')) {
            $showTime = $this->ShowTimes->patchEntity($showTime, $this->request->getData());
            if ($this->ShowTimes->save($showTime)) {
                $this->Flash->success(__('The show time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show time could not be saved. Please, try again.'));
        }
        $this->set(compact('showTime'));
        $this->set('_serialize', ['showTime']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Show Time id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $showTime = $this->ShowTimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $showTime = $this->ShowTimes->patchEntity($showTime, $this->request->getData());
            if ($this->ShowTimes->save($showTime)) {
                $this->Flash->success(__('The show time has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show time could not be saved. Please, try again.'));
        }
        $this->set(compact('showTime'));
        $this->set('_serialize', ['showTime']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Show Time id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $showTime = $this->ShowTimes->get($id);
        if ($this->ShowTimes->delete($showTime)) {
            $this->Flash->success(__('The show time has been deleted.'));
        } else {
            $this->Flash->error(__('The show time could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
