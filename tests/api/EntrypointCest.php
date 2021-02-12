<?php

namespace App\Tests\api;

use App\Tests\ApiTester;
use Codeception\Util\HttpCode;

/**
 * Class EntrypointCest
 *
 * @package App\Tests
 */
class EntrypointCest
{
    public function _before(ApiTester $I)
    {
        $I->am('Anonymous');

        $I->expect('content type is application/ld+json');
        $I->haveHttpHeader('Content-Type', 'application/ld+json');
        $I->haveHttpHeader('accept', 'application/ld+json');
    }

    /**
     * @param ApiTester $I
     */
    public function tryToGetEntrypoint(ApiTester $I)
    {
        $I->am('Anonymous API User');
        $I->expect('a list of available API resources');
        $I->sendGET('/');
        $I->seeCurrentRouteIs('api_entrypoint');
        // $I->seeResponseIsValidHydra();
        $I->seeResponseContains('"@type":"Entrypoint"');
    }
}
