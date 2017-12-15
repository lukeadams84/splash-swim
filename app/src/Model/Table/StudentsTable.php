<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentStudents
 * @property \Cake\ORM\Association\HasMany $ChildStudents
 * @property \Cake\ORM\Association\BelongsToMany $Achievements
 * @property \Cake\ORM\Association\BelongsToMany $Classes
 *
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsTable extends Table
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

        $this->setTable('students');
        $this->setDisplayField('firstname');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Parent', [
            'className' => 'Users',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'student_id'
        ]);
        $this->belongsToMany('Achievements', [
            'through' => 'StudentsAchievements'
        ]);
        /*$this->belongsToMany('Goals', [
            'foreignKey' => 'student_id',
            'targetForeignKey' => 'goal_id',
            'joinTable' => 'students_goals'
        ]);*/
        $this->belongsToMany('Goals', [
          'through' => 'StudentsGoals',
        ]);
        $this->belongsToMany('Coursegroups', [
            'foreignKey' => 'student_id',
            'targetForeignKey' => 'coursegroup_id',
            'joinTable' => 'students_classes'
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
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        return $validator;
    }

    public function findOwnedBy(Query $query, array $options)
    {
        $user = $options;
        return $query->where(['parent_id' => $user['parent']['id']]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    /*public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['parent_id'], 'ParentStudents'));

        return $rules;
    }*/
}
