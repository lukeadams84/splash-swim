<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Achievements Model
 *
 * @method \App\Model\Entity\Achievement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Achievement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Achievement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Achievement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Achievement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Achievement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Achievement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */

class GoalsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('goals');
        $this->setDisplayField('goal');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsTo('Achievements');
        /*$this->belongsToMany('Students', [
            'foreignKey' => 'goal_id',
            'targetForeignKey' => 'student_id',
            'joinTable' => 'students_goals'
        ]);*/
        $this->belongsToMany('Students', [
          'through' => 'StudentsGoals',
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('goal', 'create')
            ->notEmpty('goal');

        return $validator;
    }
}
