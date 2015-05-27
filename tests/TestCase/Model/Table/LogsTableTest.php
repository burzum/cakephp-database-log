<?php
namespace Burzum\DatabaseLog\Test\TestCase\Model\Table;

use Burzum\DatabaseLog\Model\Table\LogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Burzum\DatabaseLog\Model\Table\LogsTable Test Case
 */
class LogsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.burzum/database_log.logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Logs') ? [] : ['className' => 'Burzum\DatabaseLog\Model\Table\LogsTable'];
        $this->Logs = TableRegistry::get('Logs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Logs);
        parent::tearDown();
    }

    /**
     * testLog
     *
     * @return void
     */
    public function testLog()
    {
        $result = $this->Logs->log('warning', 'testing');
        $this->assertEquals($result->level, 'warning');
        $this->assertEquals($result->message, 'testing');
    }
}
