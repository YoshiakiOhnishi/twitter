<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DatasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DatasTable Test Case
 */
class DatasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DatasTable
     */
    public $Datas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.datas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Datas') ? [] : ['className' => DatasTable::class];
        $this->Datas = TableRegistry::get('Datas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Datas);

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
