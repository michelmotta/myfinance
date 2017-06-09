<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RevenuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RevenuesTable Test Case
 */
class RevenuesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RevenuesTable
     */
    public $Revenues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.revenues',
        'app.categories',
        'app.expenses',
        'app.expenses_categories',
        'app.revenues_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Revenues') ? [] : ['className' => 'App\Model\Table\RevenuesTable'];
        $this->Revenues = TableRegistry::get('Revenues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Revenues);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
