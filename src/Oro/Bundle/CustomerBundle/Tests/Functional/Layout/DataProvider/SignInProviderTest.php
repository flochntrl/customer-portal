<?php

namespace Oro\Bundle\CustomerBundle\Tests\Functional\Layout\DataProvider;

use Oro\Bundle\CustomerBundle\Layout\DataProvider\SignInProvider;
use Oro\Bundle\TestFrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

/**
 * @dbIsolationPerTest
 */
class SignInProviderTest extends WebTestCase
{
    /** @var SignInProvider */
    protected $dataProvider;

    /** @var  RequestStack */
    protected $requestStack;

    /** @var  CsrfTokenManagerInterface */
    protected $tokenManager;

    protected function setUp()
    {
        $this->initClient();
        $this->client->useHashNavigation(true);
        $this->requestStack = $this->getContainer()->get('request_stack');
        $this->tokenManager = $this->getContainer()->get('security.csrf.token_manager');
        $this->dataProvider = $this->getContainer()->get('oro_customer.provider.sign_in');
    }

    public function testGetLastName()
    {
        $lastUsername = 'Last Username';

        $request = new Request();
        $request->setDefaultLocale('test');
        $request->attributes->set('test', 'test_test');

        $session = new Session(new MockArraySessionStorage());
        $request->setSession($session);

        $session->set(Security::LAST_USERNAME, $lastUsername);

        $this->requestStack->push($request);

        $this->assertEquals($lastUsername, $this->dataProvider->getLastName());
    }

    /**
     * @dataProvider getErrorDataProvider
     *
     * @param \Exception $exception
     */
    public function testGetError(\Exception $exception)
    {
        $request = new Request();
        $request->setDefaultLocale('test');
        $request->attributes->set('test', 'test_test');

        $session = new Session(new MockArraySessionStorage());
        $request->setSession($session);

        $session->set(Security::AUTHENTICATION_ERROR, $exception);

        $this->requestStack->push($request);

        $this->assertSame($exception, $this->dataProvider->getError());
    }

    /**
     * @return array
     */
    public function getErrorDataProvider()
    {
        return [
            [new AuthenticationException('Test Error')],
            [new BadCredentialsException()],
        ];
    }

    public function testGetCSRFToken()
    {
        $request = new Request();

        $session = new Session(new MockArraySessionStorage());
        $request->setSession($session);

        $this->requestStack->push($request);

        $this->assertNotEmpty($this->dataProvider->getCSRFToken());
    }
}
