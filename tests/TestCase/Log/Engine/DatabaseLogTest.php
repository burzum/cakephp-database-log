<?php
namespace Burzum\DatabaseLog\Test\TestCase\Model\Table;

use Burzum\DatabaseLog\Log\Engine\DatabaseLog;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Burzum\DatabaseLog\Log\Engine\DatabaseLogTest Test Case
 */
class DatabaseLogTest extends TestCase
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
     * testLogging
     *
     * @return void
     */
    public function testLogging()
    {
        Log::config('dblogtest', [
            'className' => 'Burzum\DatabaseLog\Log\Engine\DatabaseLog',
            //'path' => LOGS,
            'levels' => ['warning', 'error', 'critical', 'alert', 'emergency'],
            //'file' => 'error',
        ]);

        Log::write('warning', 'testing');
        $result = $this->Logs->find()->first();
        $this->assertEquals($result->level, 'warning');
        $this->assertEquals($result->message, 'testing');
        $this->Logs->deleteAll([]);
    }
}
