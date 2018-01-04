<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\Utility\Hash;


class FrontController extends AppController
{

  public function classes() {
    $swimclasses = TableRegistry::get('Swimclasses');
    $swimclasses = $swimclasses->find('all', [
      'contain' => [
        'Classevents' => [
          'conditions' => [
            'weeknum =' => 1, 'classdate >' => Date::now()
          ],
          'sort' => ['classdate' => 'ASC']
        ]
      ]
    ]);


    $this->set(compact('swimclasses'));

  }

  public function venues() {

 }

 public function faqs() {
   $faqs = TableRegistry::get('Faqs');
   $faqs = $faqs->find('all');
   $this->set(compact('faqs'));
 }
}
