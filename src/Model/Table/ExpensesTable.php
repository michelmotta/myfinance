<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
use Cake\I18n\Time;

/**
 * Expenses Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Categories
 *
 * @method \App\Model\Entity\Expense get($primaryKey, $options = [])
 * @method \App\Model\Entity\Expense newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Expense[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Expense|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Expense patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Expense[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Expense findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExpensesTable extends Table
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

        $this->table('expenses');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'receipt' => [
                'fields' => [
                    // if these fields or their defaults exist
                    // the values will be set.
                    'dir' => 'receipt_dir', // defaults to `dir`
                    'size' => 'receipt_size', // defaults to `size`
                    'type' => 'receipt_type'
                ],
                'nameCallback' => function(array $data, array $settings) {
                    $ext = substr(strrchr($data['name'], '.'), 1);
                    return md5(time().rand(1111, 999999)) . '.' . $ext;
                }
            ],
        ]);

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Categories', [
            'foreignKey' => 'expense_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'expenses_categories'
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
            ->allowEmpty('name');

        $validator
            ->decimal('value')
            ->allowEmpty('value');

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->allowEmpty('receipt');

        $validator
            ->allowEmpty('receipt_dir');

        $validator
            ->allowEmpty('description');

        return $validator;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
       if (isset($data['date'])) {
           $data['date'] = implode("-",array_reverse(explode("/", $data['date'])));
       }
    }
}
