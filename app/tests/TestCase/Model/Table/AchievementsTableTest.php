<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AchievementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AchievementsTable Test Case
 */
class AchievementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AchievementsTable
     */
    public $Achievements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.achievements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Achievements') ? [] : ['className' => 'App\Model\Table\AchievementsTable'];
        $this->Achievements = TableRegistry::get('Achievements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Achievements);

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
