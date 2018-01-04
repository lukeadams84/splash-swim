<?php
// In a controller
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;

class ContactController extends AppController
{
public function index()
{
  $contact = new ContactForm();
    if ($this->request->is('post')) {

      if ($contact->execute($this->request->getData())) {
        //$this->Flash->success('Your message has been sent; we\'ll get back to you soon!');
        return $this->redirect('/');
      } else {

        $this->Flash->error('There was a problem submitting your form.');
        return $this->redirect('/');
      }
    }
    $this->set('contact', $contact);
  }
}
