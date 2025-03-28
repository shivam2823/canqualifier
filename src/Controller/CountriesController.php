<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\View\Helper\BreadcrumbsHelper;
/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 *
 * @method \App\Model\Entity\Country[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountriesController extends AppController
{
    public function isAuthorized($user)
    {
	// Admin can access every action
	if (isset($user['role_id']) && $user['active'] == 1) {
		if($user['role_id'] == SUPER_ADMIN || $user['role_id'] == ADMIN){		
			return true;
		}
	}
	// Default deny
	return false;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$totalCount = $this->Countries->find('all')->count();	
		 $this->paginate = [       
		'limit'=>$totalCount,
        'maxLimit'=>$totalCount
        ];
		
        $countries = $this->paginate($this->Countries);
        $this->set(compact('countries'));
    }

    /**
     * View method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $country = $this->Countries->get($id, contain: ['States']);
        $this->set('country', $country);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $country = $this->Countries->newEntity([]);
        if ($this->request->is('post')) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            $country->created_by = $this->getRequest()->getSession()->read('Auth.User.id');
            if ($this->Countries->save($country)) {
                $this->Flash->success(__('The country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country could not be saved. Please, try again.'));
        }
        $this->set(compact('country'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $country = $this->Countries->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            $country->modified_by = $this->getRequest()->getSession()->read('Auth.User.id');
            if ($this->Countries->save($country)) {
                $this->Flash->success(__('The country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country could not be saved. Please, try again.'));
        }
        $this->set(compact('country'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $country = $this->Countries->get($id);
        if ($this->Countries->delete($country)) {
            $this->Flash->success(__('The country has been deleted.'));
        } else {
            $this->Flash->error(__('The country could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	/*public function getstates($id = null)
	{
		 $this->viewBuilder()->setLayout('ajax');
		 $states = $this->Countries->States->find('list', ['keyField' => 'id', 'valueField' => 'name' ])->where(['country_id'=>$id])->toList();		 
		 $this->set(compact('states'));
	}*/
     public function getStates($label=false,$id=null)
    {
        $this->loadModel('States');
        $this->viewBuilder()->setLayout('ajax_content');

        $stateOptions = [];
        if ($id!==null) {
            $stateOptions = $this->States->find('list', ['keyField'=>'id', 'valueField'=>'name'])->where(['country_id'=>$id])->toArray();       
        }
        $this->set(compact('stateOptions','label'));
    }
     public function getClientStates($label=false,$id=null)
    {
        $this->loadModel('States');
        $this->viewBuilder()->setLayout('ajax_content');

        $stateOptions = [];
        if ($id!==null) {
            $stateOptions = $this->States->find('list', ['keyField'=>'id', 'valueField'=>'name'])->where(['country_id'=>$id])->toArray();       
        }
        $this->set(compact('stateOptions','label'));
    }
    
}
