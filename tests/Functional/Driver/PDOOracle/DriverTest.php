<?php

namespace Doctrine\DBAL\Tests\Functional\Driver\PDOOracle;

use Doctrine\DBAL\Driver as DriverInterface;
use Doctrine\DBAL\Driver\PDOOracle\Driver;
use Doctrine\DBAL\Tests\Functional\Driver\AbstractDriverTest;
use function extension_loaded;

class DriverTest extends AbstractDriverTest
{
    protected function setUp() : void
    {
        if (! extension_loaded('PDO_OCI')) {
            self::markTestSkipped('PDO_OCI is not installed.');
        }

        parent::setUp();

        if ($this->connection->getDriver() instanceof Driver) {
            return;
        }

        self::markTestSkipped('PDO_OCI only test.');
    }

    /**
     * {@inheritdoc}
     */
    public function testConnectsWithoutDatabaseNameParameter() : void
    {
        self::markTestSkipped('Oracle does not support connecting without database name.');
    }

    /**
     * {@inheritdoc}
     */
    public function testReturnsDatabaseNameWithoutDatabaseNameParameter() : void
    {
        self::markTestSkipped('Oracle does not support connecting without database name.');
    }

    /**
     * {@inheritdoc}
     */
    protected function createDriver() : DriverInterface
    {
        return new Driver();
    }
}