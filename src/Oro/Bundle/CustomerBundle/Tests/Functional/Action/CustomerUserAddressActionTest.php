<?php

namespace Oro\Bundle\CustomerBundle\Tests\Functional\Action;

use Oro\Bundle\CustomerBundle\Entity\CustomerUser;
use Oro\Bundle\CustomerBundle\Entity\CustomerUserAddress;
use Oro\Bundle\CustomerBundle\Tests\Functional\DataFixtures\LoadCustomerUserAddresses;
use Oro\Bundle\CustomerBundle\Tests\Functional\DataFixtures\LoadCustomerUserData;
use Oro\Bundle\TestFrameworkBundle\Test\WebTestCase;

class CustomerUserAddressActionTest extends WebTestCase
{
    protected function setUp()
    {
        $this->initClient(
            [],
            $this->generateBasicAuthHeader(LoadCustomerUserData::EMAIL, LoadCustomerUserData::PASSWORD)
        );
        $this->client->useHashNavigation(true);
        $this->loadFixtures(
            [
                LoadCustomerUserData::class,
                LoadCustomerUserAddresses::class
            ]
        );
    }

    public function testDelete()
    {
        /** @var CustomerUser customerUser */
        $customerUser = $this->getReference(LoadCustomerUserData::EMAIL);
        $id = $customerUser->getAddresses()->first()->getId();
        $operationName = 'oro_customer_user_frontend_address_delete';
        $entityClass = CustomerUserAddress::class;
        $this->client->request(
            'POST',
            $this->getUrl(
                'oro_frontend_action_operation_execute',
                [
                    'operationName' => $operationName,
                    'entityId' => $id,
                    'entityClass' => $entityClass,
                ]
            ),
            $this->getOperationExecuteParams($operationName, $id, $entityClass),
            [],
            ['HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest']
        );

        $this->assertJsonResponseStatusCodeEquals($this->client->getResponse(), 200);

        self::getContainer()->get('doctrine')->getManagerForClass($entityClass)->clear();

        $removedAddress = self::getContainer()
            ->get('doctrine')
            ->getRepository('OroCustomerBundle:CustomerUserAddress')
            ->find($id);

        static::assertNull($removedAddress);
    }

    /**
     * @param $operationName
     * @param $entityId
     * @param $entityClass
     *
     * @return array
     */
    protected function getOperationExecuteParams($operationName, $entityId, $entityClass)
    {
        $actionContext = [
            'entityId'    => $entityId,
            'entityClass' => $entityClass
        ];
        $container = self::getContainer();
        $operation = $container->get('oro_action.operation_registry')->findByName($operationName);
        $actionData = $container->get('oro_action.helper.context')->getActionData($actionContext);

        $tokenData = $container
            ->get('oro_action.operation.execution.form_provider')
            ->createTokenData($operation, $actionData);
        $container->get('session')->save();

        return $tokenData;
    }
}
