<?php
// In a controller
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ContactForm;
use Cake\ORM\TableRegistry;


class ContactController extends AppController
{

public function index()
{
  $contactsTable = TableRegistry::get('Contacts');
  $contactRecord = $contactsTable->newEntity();

  $contact = new ContactForm();
    if ($this->request->is('post')) {

      $data = $this->request->getData();

      $contactRecord->email = $data['email'];
      $contactRecord->recordedname = $data['name'];
      $contactRecord->body = $data['body'];
      $contactRecord->source = 'Contact Form';
      $contactRecord->read = 0;
      $contactsTable->save($contactRecord);

      if ($contact->execute($this->request->getData())) {
        $this->Flash->success('Your message has been sent; we\'ll get back to you soon!');
        return $this->redirect('/');
      } else {

        $this->Flash->error('There was a problem submitting your form.');
        return $this->redirect('/');
      }
    }
    $this->set('contact', $contact);
  }

public function read($id) {
  $contactsTable = TableRegistry::get('Contacts');
  $contactRecord = $contactsTable->get($id);
  $data = ['Contacts' => [ 'read' => 1]];
  $contactsTable->patchEntity($contactRecord, $data, ['validate' => false ]);
  if($contactsTable->save($contactRecord))
  {
      $this->Flash->success('Message marked as read');
      return $this->redirect('/admin/dash');
  }

}
}
