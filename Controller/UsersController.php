<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout');
    }

    public function index() {
        $this->layout = 'dashboard';
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        $this->layout = 'dashboard';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuario Creado Correctamente'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se pudo guardar el usuario, por favor intente nuevamente.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario Invalido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuario Guardado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('No se pudo guardar el usuario, por favor intente nuevamente.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $this->layout = 'dashboard';
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuario Eliminado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('No se ha podido eliminar el Usuario'));
        return $this->redirect(array('action' => 'index'));
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Usuario o Contraseña Incorrectos'));
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}

?>