<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Http\Client;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['signup', 'emailVerification', 'passwordRecovery','newPassword']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Generations', 'Careers']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Generations', 'Careers', 'Achievements', 'Companies', 'Questions', 'Skills']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $generations = $this->Users->Generations->find('list', ['limit' => 200]);
        $careers = $this->Users->Careers->find('list', ['limit' => 200]);
        $achievements = $this->Users->Achievements->find('list', ['limit' => 200]);
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $questions = $this->Users->Questions->find('list', ['limit' => 200]);
        $skills = $this->Users->Skills->find('list', ['limit' => 200]);
        $this->set(compact('user', 'generations', 'careers', 'achievements', 'companies', 'questions', 'skills'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Achievements', 'Companies', 'Questions', 'Skills']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $generations = $this->Users->Generations->find('list', ['limit' => 200]);
        $careers = $this->Users->Careers->find('list', ['limit' => 200]);
        $achievements = $this->Users->Achievements->find('list', ['limit' => 200]);
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $questions = $this->Users->Questions->find('list', ['limit' => 200]);
        $skills = $this->Users->Skills->find('list', ['limit' => 200]);
        $this->set(compact('user', 'generations', 'careers', 'achievements', 'companies', 'questions', 'skills'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
     $this->viewBuilder()->layout('register');

     if ($this->request->is('post')) {
        $user = $this->Auth->identify();
	debug($user);
        if ($user) {
          $this->Auth->setUser($user);
          return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Invalid username or password, try again'));
      }

    }

    public function logout()
    {
      return $this->redirect($this->Auth->logout());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function signup()
    {    
     $this->viewBuilder()->layout('register');

      $user = $this->Users->newEntity();

      if ($this->request->is('post')) {
        //if ($this->Recaptcha->verify()) {
          $user = $this->Users->patchEntity($user, $this->request->data);
          $user->role = 'student';
          $user->email_validation_code = mt_rand(100000, 999999);
          if ($this->Users->save($user)) {
            $email = new Email();
            $email
		->template('welcome', 'welcome')
                ->to($user->email)
                ->from('webmaster@egresadositt.com')
		->emailFormat('html')
                ->viewVars(['link' => "http://dev.egresadositt.com/users/emailVerification/" . $user->id . "/" . $user->email_validation_code, 'name' => ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) ])
		->send();
            $login = $this->Auth->setUser($user);

            $this->Flash->success(__('The user has been saved.'));
              return $this->redirect([ 'action' => 'personal', $user->id]);
          } else
             $this->Flash->error(__('The user could not be saved. Please, try again.'));
        //} else
          //$this->Flash->error(__('Please check your Recaptcha Box.'));
      }

      $this->set(compact('user'));
      $this->set('_serialize', ['user']);
     }

     public function education()
     {
        $this->viewBuilder()->layout('register');
         $user = $this->Users->get($this->Auth->user("id"), [
             'contain' => []
         ]);

         if($this->request->is(['post', 'put'])){
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->stage = 3;
            if ($this->Users->save($user)) {
              $this->Flash->success(__('The user has been saved.'));
                return $this->redirect([ 'action' => 'work']);
            } else
               $this->Flash->error(__('The user could not be saved. Please, try again.'));
         }
         
        $generations = $this->Users->Generations->find('list', ['limit' => 200]);
        $careers = $this->Users->Careers->find('list', ['limit' => 200]);
         $this->set(compact('user', 'generations', 'careers'));
     }

     public function personal()
     {
        $this->viewBuilder()->layout('register');
         $user = $this->Users->get($this->Auth->user("id"), [
             'contain' => []
         ]);

         if($this->request->is(['post', 'put'])){
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->stage = 2;
            if ($this->Users->save($user)) {
              $this->Flash->success(__('The user has been saved.'));
                return $this->redirect([ 'action' => 'education']);
            } else
               $this->Flash->error(__('The user could not be saved. Please, try again.'));
         }

         $this->set(compact('user'));
     }

     public function work()
     {
            $this->viewBuilder()->layout('register');
             $user = $this->Users->get($this->Auth->user("id"), [
                 'contain' => ['Companies']
             ]);
             if($this->request->is(['post'])){
                $data = $this->request->data();
                $company = $this->Users->Companies->getOrCreate($data['company']);
                $start_date = implode("-", $data['start_date']);
                $end_date = implode("-", $data['end_date']);
                
                $user_data = [
                    'first_name' => "Rolando",
                    'companies' => [
                        [
                            'id' => $company->id,
                            '_joinData' => [
                                'position' => $data['position'],
                                'start_date' => strlen($start_date) == 10 ? $start_date : null,
                                'end_date' => strlen($end_date) == 10 ? $end_date : null,
                                'description' => $data['description'],
                                'current_job' => true
                            ]
                        ]
                    ]
                ];
                $user = $this->Users->patchEntity($user, $user_data);

                if ($this->Users->save($user)) {
                  $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect([ 'action' => 'phoneVerification']);
                } else
                   $this->Flash->error(__('The user could not be saved. Please, try again.'));
                // next step
             }

             $this->set(compact('user'));
     }


     public function emailVerification($id, $code)
     {
          $this->viewBuilder()->layout('register');
          $user = $this->Users->find('emailVerification', ['id' => $id, 'code' => $code])->first();
          if($user){
            $user->email_verified = true;
            $this->Users->save($user);
          }
          $this->set(compact('user'));
     }

     public function addPhone()
     {
          $this->viewBuilder()->layout('register');
          $user = $this->Users->get($this->Auth->user("id"));

            if($this->request->is(['post', 'put'])){
		$user->mobile_phone_number = $this->request->data('phone_full');

		if ($this->Users->save($user)) {
		    $this->sendSMS($user);
                    return $this->redirect([ 'action' => 'phoneVerification']);
                } else {
                   $this->Flash->error(__('The user could not be saved. Please, try again.'));
	 	} 
            }
        

          $this->set(compact('user'));
     }

    public function phoneVerification() {
      	$this->viewBuilder()->layout('register');
        $user = $this->Users->get($this->Auth->user("id"));

    	if($this->request->is(['post', 'put'])){
		$data = $this->request->getData();
        	$user = $this->Users->findBySmsValidationCodeAndId($data['code'], $this->Auth->user("id"))->first();
        		if($user){
				$user->sms_validation_code = null;
                  		$user->sms_verified = true;
                  		$this->Users->save($user);
                  		$this->Flash->success(__('The phone has been verified.'));
                	}else{
                     		$this->Flash->error(__('The phone could not be verified. Please, try again.'));
                	}
    	}		
        $this->set(compact('user'));
    }

    private function sendSMS($user) {
	$this->loadModel('Settings');
        $settings = $this->Settings->get(0);

        //Define SMS Parameters from Settings
        $userid = $settings->sms_user;
        $pwd = $settings->sms_pass;
        $apikey = $settings->sms_apikey;
        $from = $settings->sms_from;
        $to = preg_replace("/[^0-9]/", "", $user->mobile_phone_number); // remove all non numeric i.e. remove "+" from +52641234567890
        $code = rand(1000, 9999);;
        $user->sms_validation_code = $code;
        $msg  = " [Egresados ITT ] Su codigo de validacion es: $code";
        $http = new Client(['host' => 'www.experttexting.com', 'scheme' => 'https']);
        $response = $http->post('/exptapi/exptsms.asmx/SendSMS', 
					['UserID' => $userid, 
					 'PWD' => $pwd, 
					 'APIKEY' => $apikey,
					 'FROM' => $from, 
					 'TO' => $to, 
					 'MSG' => $msg
				]);
	if($response->code == 200) {
        	$user->sms_validation_code = $code;
		$this->Users->save($user);
	}
    }
    

    public function passwordRecovery() {
	$this->viewBuilder()->layout('register');
      	if ($this->request->is('post')) {
		$data = $this->request->getData();
		$user = $this->Users->findByEmail($data['email'])->first();
		if(empty($user)) {
			$this->Flasg->error('Oops, no encontramos tu email en nuestro sistema, verifica e intenta de nuevo.');
                	return $this->redirect('/users/password-recovery');
		}

		$user->email_validation_code = bin2hex(random_bytes(16));
		if($this->Users->save($user)) {
			$email = new Email();
			$email
                		->template('password', 'welcome')
                		->to($user->email)
                		->from('webmaster@egresadositt.com')
                		->emailFormat('html') 
                		->viewVars(['link' => "http://dev.egresadositt.com/users/new_password/" . $user->id . "/" . $user->email_validation_code, 
					    'name' => ucfirst($user->first_name) ])
                		->send();

			$this->Flash->success('Te hemos enviado un correo electrónico con las instrucciones para resetear tu contraseña.');
                   	return $this->redirect('/users/login');
		}
	}	
    }

     public function newPassword($id = null, $code = null)
     {
        $this->viewBuilder()->layout('register');

	if ($this->request->is('post')) {
		$data = $this->request->getData();
		debug($data);
		// root perdoname, yo sé que la validación no se hace aquí
		if ($data['new_password'] != $data['confirm_password']) {
			$this->Flash->error('El password no coincide.');
			return $this->redirect( ['action' => 'new-password', $data['id'], $data['email_validation_code']] );
		}

		$user = $this->Users->findByEmailValidationCodeAndId($data['email_validation_code'], $data['id'])->first();
		$user->password = $data['new_password'];
		$user->email_validation_code = 'expired';
		if($this->Users->save($user)) {
			$this->Flash->success('Hemos restablecido tu contraseña.');
                        return $this->redirect('/users/login');
		}

		$this->Flash->error('Se produjo un error al guardar.');
                return $this->redirect( [ 'action' => 'new-password', $data['id'], $data['email_validation_code']]);

	}
	
       $user = $this->Users->findByEmailValidationCodeAndId($code, $id)->first();
       if(empty($user)){
		$this->Flash->error('Oops, no deberías estar aquí, algo no salió como esperaba.');
            	return $this->redirect('/users/login');
        }
	$this->set(compact('user'));
     }
}
