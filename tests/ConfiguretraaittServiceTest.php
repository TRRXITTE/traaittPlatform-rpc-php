<?php

namespace Tests;

use traaittPlatform\ETRXservice;

class ConfiguretraaittServiceTest extends TestCase
{
    public function testConfigureDefaultValues()
    {
        $ETRXservice = new ETRXservice();
        $ETRXservice->configure([]);
        $this->assertEquals([
            'rpcHost'      => 'http://127.0.0.1',
            'rpcPort'      => 8447,
            'rpcPassword'  => 'test',
            'rpcBaseRoute' => '/json_rpc',
        ], $ETRXservice->config());
    }

    public function testConfigureAllValues()
    {
        $ETRXservice = new ETRXservice();
        $ETRXservice->configure([
            'rpcHost'      => 'https://192.168.10.10',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ]);

        $this->assertEquals([
            'rpcHost'      => 'https://192.168.10.10',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ], $ETRXservice->config());
    }

    public function testConfigureViaConstructor()
    {
        $ETRXservice = new ETRXservice([
            'rpcHost'      => 'https://192.168.10.10',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ]);

        $this->assertEquals([
            'rpcHost'      => 'https://192.168.10.10',
            'rpcPort'      => 8080,
            'rpcPassword'  => 'testing',
            'rpcBaseRoute' => '/api/v1',
        ], $ETRXservice->config());
    }

    public function testConfigureDoesntOverwriteOtherVariables()
    {
        $ETRXservice = new ETRXservice();
        $ETRXservice->configure([
            'client' => 'should not be able to set this value',
        ]);

        $this->assertNotEquals($ETRXservice->client(), 'should not be able to set this value');
    }
}