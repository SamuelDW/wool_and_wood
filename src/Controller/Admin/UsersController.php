<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Event\EventInterface;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Add allowed paths for unauthenticated users
     *
     * @param \Cake\Event\EventInterface $event The event
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function index()
    {

    }
    /**
     * Login Method
     * Checks the users password against the stored value and redirects upon a successful attempt
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            /**
             * @var \Authentication\Identity
             */
            $identity = $this->Authentication->getIdentity();
            /**
             * @var \App\Model\Entity\User
             */
            $user = $this->Users->get($identity->getIdentifier());

            if ($user->is_archived || !$user->is_admin) {
                $this->Authentication->logout();
                $this->Flash->error(
                    __('You do not have sufficient privileges. If this is a mistake, please contact our tech team.')
                );
            }

            $adminHome = Router::url(['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'index'], true);
            $redirect = $this->getRequest()->getQuery('redirect', $adminHome);
            return $this->redirect($redirect);

           // $target = $this->Authentication->getLoginRedirect() ?? '/home';
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
        $this->viewBuilder()->setLayout('no_nav');
    }

    /**
     * Logout Method
     * Destorys any session and authentication identity the logged in user has and redirects to login
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'login']);
        }
    }
}
