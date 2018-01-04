<?php
// in src/Form/ContactForm.php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;

class ContactForm extends Form
{

/*protected function _buildSchema(Schema $schema)
{
return $schema->addField('name', 'string')
->addField('email', ['type' => 'string'])
->addField('body', ['type' => 'text']);
}*/

protected function _buildValidator(Validator $validator)
{
  return $validator->add('email', 'format', [
  'rule' => 'email',
  'message' => 'Please enter a valid email address',
  ]);
}

protected function _execute(array $data)
{
$email = new Email();
$email->profile('default');

$email->from('online@splashswimschools.co.uk')
->replyTo([$data['email']])
->to('luke@thirteen-37.com')
->subject('Splash Contact Form')
->send(['Email from: ' . $data['email'] . '    ' . $data['body']]);
return true;
}
}
