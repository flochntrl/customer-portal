<?php

namespace Oro\Bundle\FrontendBundle\Tests\Unit\Request;

use Oro\Bundle\FrontendBundle\Request\DynamicSessionHttpKernelDecorator;
use Oro\Bundle\FrontendBundle\Request\FrontendHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class DynamicSessionHttpKernelDecoratorTest extends \PHPUnit\Framework\TestCase
{
    private const BACKEND_SESSION_OPTIONS = [
        'name'            => 'BACK',
        'cookie_path'     => '/admin',
        'cookie_lifetime' => 10
    ];

    private const FRONTEND_SESSION_OPTIONS = [
        'name'        => 'FRONT',
        'cookie_path' => '/'
    ];

    /** @var HttpKernel|\PHPUnit\Framework\MockObject\MockObject */
    private $kernel;

    /** @var ContainerInterface */
    private $container;

    /** @var FrontendHelper|\PHPUnit\Framework\MockObject\MockObject */
    private $frontendHelper;

    /** @var DynamicSessionHttpKernelDecorator */
    private $kernelDecorator;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $this->kernel = $this->createMock(HttpKernel::class);
        $this->container = new ContainerStub([
            'session.storage.options' => self::BACKEND_SESSION_OPTIONS
        ]);
        $this->frontendHelper = $this->createMock(FrontendHelper::class);

        $this->kernelDecorator = new DynamicSessionHttpKernelDecorator(
            $this->kernel,
            $this->container,
            $this->frontendHelper,
            self::FRONTEND_SESSION_OPTIONS
        );
    }

    public function testTerminate()
    {
        $request = Request::create('http://localhost/admin/test.php');
        $response = $this->createMock(Response::class);

        $this->kernel->expects(self::once())
            ->method('terminate')
            ->with(self::identicalTo($request), self::identicalTo($response));

        $this->kernelDecorator->terminate($request, $response);
    }

    public function testHandleForBackendRequest()
    {
        $request = Request::create('http://localhost/admin/test.php');
        $type = HttpKernelInterface::MASTER_REQUEST;
        $catch = true;
        $response = $this->createMock(Response::class);

        $this->frontendHelper->expects(self::once())
            ->method('isFrontendRequest')
            ->with(self::identicalTo($request))
            ->willReturn(false);
        $this->kernel->expects(self::once())
            ->method('handle')
            ->with(self::identicalTo($request), $type, $catch)
            ->willReturn($response);

        self::assertSame(
            $response,
            $this->kernelDecorator->handle($request, $type, $catch)
        );

        self::assertEquals(
            self::BACKEND_SESSION_OPTIONS,
            $this->container->getParameter('session.storage.options')
        );
        self::assertAttributeSame(
            false,
            'isFrontendSessionOptionsApplied',
            $this->kernelDecorator
        );
        self::assertAttributeSame(
            null,
            'backendSessionOptions',
            $this->kernelDecorator
        );
    }

    public function testHandleForFrontendRequest()
    {
        $request = Request::create('http://localhost/test.php');
        $type = HttpKernelInterface::MASTER_REQUEST;
        $catch = true;
        $response = $this->createMock(Response::class);

        $this->frontendHelper->expects(self::once())
            ->method('isFrontendRequest')
            ->with(self::identicalTo($request))
            ->willReturn(true);
        $this->kernel->expects(self::once())
            ->method('handle')
            ->with(self::identicalTo($request), $type, $catch)
            ->willReturn($response);

        self::assertSame(
            $response,
            $this->kernelDecorator->handle($request, $type, $catch)
        );

        self::assertEquals(
            array_replace(self::BACKEND_SESSION_OPTIONS, self::FRONTEND_SESSION_OPTIONS),
            $this->container->getParameter('session.storage.options')
        );
        self::assertAttributeSame(
            true,
            'isFrontendSessionOptionsApplied',
            $this->kernelDecorator
        );
        self::assertAttributeEquals(
            self::BACKEND_SESSION_OPTIONS,
            'backendSessionOptions',
            $this->kernelDecorator
        );
    }

    public function testHandleForBackendRequestAfterFrontendRequest()
    {
        $this->frontendHelper->expects(self::exactly(2))
            ->method('isFrontendRequest')
            ->willReturnOnConsecutiveCalls(true, false);
        $this->kernel->expects(self::exactly(2))
            ->method('handle')
            ->willReturnOnConsecutiveCalls($this->createMock(Response::class), $this->createMock(Response::class));

        $this->kernelDecorator->handle(Request::create('http://localhost/test.php'));
        $this->kernelDecorator->handle(Request::create('http://localhost/admin/test.php'));

        self::assertEquals(
            self::BACKEND_SESSION_OPTIONS,
            $this->container->getParameter('session.storage.options')
        );
        self::assertAttributeSame(
            false,
            'isFrontendSessionOptionsApplied',
            $this->kernelDecorator
        );
        self::assertAttributeEquals(
            self::BACKEND_SESSION_OPTIONS,
            'backendSessionOptions',
            $this->kernelDecorator
        );
    }

    public function testHandleForFrontendRequestAfterBackendRequest()
    {
        $this->frontendHelper->expects(self::exactly(2))
            ->method('isFrontendRequest')
            ->willReturnOnConsecutiveCalls(false, true);
        $this->kernel->expects(self::exactly(2))
            ->method('handle')
            ->willReturnOnConsecutiveCalls($this->createMock(Response::class), $this->createMock(Response::class));

        $this->kernelDecorator->handle(Request::create('http://localhost/admin/test.php'));
        $this->kernelDecorator->handle(Request::create('http://localhost/test.php'));

        self::assertEquals(
            array_replace(self::BACKEND_SESSION_OPTIONS, self::FRONTEND_SESSION_OPTIONS),
            $this->container->getParameter('session.storage.options')
        );
        self::assertAttributeSame(
            true,
            'isFrontendSessionOptionsApplied',
            $this->kernelDecorator
        );
        self::assertAttributeEquals(
            self::BACKEND_SESSION_OPTIONS,
            'backendSessionOptions',
            $this->kernelDecorator
        );
    }
}
