<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Moviesls Controller
 *
 *
 * @method \App\Model\Entity\Moviesl[] paginate($object = null, array $settings = [])
 */
class MovieslsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $moviesls = $this->paginate($this->Moviesls);

        $this->set(compact('moviesls'));
        $this->set('_serialize', ['moviesls']);
    }

    /**
     * View method
     *
     * @param string|null $id Moviesl id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moviesl = $this->Moviesls->get($id, [
            'contain' => []
        ]);

        $this->set('moviesl', $moviesl);
        $this->set('_serialize', ['moviesl']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moviesl = $this->Moviesls->newEntity();
        if ($this->request->is('post')) {
            $moviesl = $this->Moviesls->patchEntity($moviesl, $this->request->getData());
            if ($this->Moviesls->save($moviesl)) {
                $this->Flash->success(__('The moviesl has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moviesl could not be saved. Please, try again.'));
        }
        $this->set(compact('moviesl'));
        $this->set('_serialize', ['moviesl']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Moviesl id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moviesl = $this->Moviesls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moviesl = $this->Moviesls->patchEntity($moviesl, $this->request->getData());
            if ($this->Moviesls->save($moviesl)) {
                $this->Flash->success(__('The moviesl has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moviesl could not be saved. Please, try again.'));
        }
        $this->set(compact('moviesl'));
        $this->set('_serialize', ['moviesl']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Moviesl id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moviesl = $this->Moviesls->get($id);
        if ($this->Moviesls->delete($moviesl)) {
            $this->Flash->success(__('The moviesl has been deleted.'));
        } else {
            $this->Flash->error(__('The moviesl could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
