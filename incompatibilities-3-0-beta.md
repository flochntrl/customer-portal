- [CustomerBundle](#customerbundle)
- [FrontendBundle](#frontendbundle)
- [WebsiteBundle](#websitebundle)

CustomerBundle
--------------
* The `CustomerActionPermissionProvider`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Datagrid/CustomerActionPermissionProvider.php#L11 "Oro\Bundle\CustomerBundle\Datagrid\CustomerActionPermissionProvider")</sup> class was removed.
* The `EntityOwnershipDecisionMaker::__construct(OwnerTreeProviderInterface $treeProvider, ObjectIdAccessor $objectIdAccessor, EntityOwnerAccessor $entityOwnerAccessor, OwnershipMetadataProviderInterface $ownershipMetadataProvider, TokenAccessorInterface $tokenAccessor, ManagerRegistry $doctrine)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Owner/EntityOwnershipDecisionMaker.php#L33 "Oro\Bundle\CustomerBundle\Owner\EntityOwnershipDecisionMaker")</sup> method was changed to `EntityOwnershipDecisionMaker::__construct(OwnerTreeProviderInterface $treeProvider, ObjectIdAccessor $objectIdAccessor, EntityOwnerAccessor $entityOwnerAccessor, OwnershipMetadataProviderInterface $ownershipMetadataProvider, TokenAccessorInterface $tokenAccessor, ManagerRegistry $doctrine, PropertyAccessor $propertyAccessor)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Owner/EntityOwnershipDecisionMaker.php#L42 "Oro\Bundle\CustomerBundle\Owner\EntityOwnershipDecisionMaker")</sup>
* The `SignInProvider::__construct(RequestStack $requestStack, TokenAccessorInterface $tokenAccessor, CsrfTokenManagerInterface $csrfTokenManager)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Layout/DataProvider/SignInProvider.php#L32 "Oro\Bundle\CustomerBundle\Layout\DataProvider\SignInProvider")</sup> method was changed to `SignInProvider::__construct(RequestStack $requestStack, TokenAccessorInterface $tokenAccessor, CsrfTokenManagerInterface $csrfTokenManager, SignInTargetPathProviderInterface $targetPathProvider)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Layout/DataProvider/SignInProvider.php#L36 "Oro\Bundle\CustomerBundle\Layout\DataProvider\SignInProvider")</sup>
* The `CustomerRolePageListener::__construct(TranslatorInterface $translator)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/CustomerRolePageListener.php#L23 "Oro\Bundle\CustomerBundle\EventListener\CustomerRolePageListener")</sup> method was changed to `CustomerRolePageListener::__construct(TranslatorInterface $translator, RequestStack $requestStack)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/EventListener/CustomerRolePageListener.php#L23 "Oro\Bundle\CustomerBundle\EventListener\CustomerRolePageListener")</sup>
* The following methods in class `CustomerDatagridListener`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L27 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener")</sup> were changed:
  > - `__construct(CustomerUserProvider $securityProvider, CustomerRepository $repository, array $actionCallback = null)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L47 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener")</sup>
  > - `__construct(CustomerUserProvider $securityProvider, array $columns = [ ... ])`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L27 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener")</sup>

  > - `removeCustomerUserColumn(DatagridConfiguration $config, $column)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L140 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener")</sup>
  > - `removeCustomerUserColumn(DatagridConfiguration $config, string $column)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L66 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener")</sup>

* The following methods in class `CustomerAddressController`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerAddressController.php#L28 "Oro\Bundle\CustomerBundle\Controller\CustomerAddressController")</sup> were changed:
  > - `addressBookAction(Customer $customer)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Controller/CustomerAddressController.php#L28 "Oro\Bundle\CustomerBundle\Controller\CustomerAddressController")</sup>
  > - `addressBookAction(Request $request, Customer $customer)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerAddressController.php#L28 "Oro\Bundle\CustomerBundle\Controller\CustomerAddressController")</sup>

  > - `update(Customer $customer, CustomerAddress $address)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Controller/CustomerAddressController.php#L79 "Oro\Bundle\CustomerBundle\Controller\CustomerAddressController")</sup>
  > - `update(Request $request, Customer $customer, CustomerAddress $address)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerAddressController.php#L82 "Oro\Bundle\CustomerBundle\Controller\CustomerAddressController")</sup>

* The following methods in class `CustomerGroupController`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerGroupController.php#L66 "Oro\Bundle\CustomerBundle\Controller\CustomerGroupController")</sup> were changed:
  > - `createAction()`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Controller/CustomerGroupController.php#L68 "Oro\Bundle\CustomerBundle\Controller\CustomerGroupController")</sup>
  > - `createAction(Request $request)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerGroupController.php#L66 "Oro\Bundle\CustomerBundle\Controller\CustomerGroupController")</sup>

  > - `update(CustomerGroup $group)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Controller/CustomerGroupController.php#L95 "Oro\Bundle\CustomerBundle\Controller\CustomerGroupController")</sup>
  > - `update(Request $request, CustomerGroup $group)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerGroupController.php#L94 "Oro\Bundle\CustomerBundle\Controller\CustomerGroupController")</sup>

* The following methods in class `CustomerUserAddressController`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerUserAddressController.php#L27 "Oro\Bundle\CustomerBundle\Controller\CustomerUserAddressController")</sup> were changed:
  > - `addressBookAction(CustomerUser $customerUser)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Controller/CustomerUserAddressController.php#L28 "Oro\Bundle\CustomerBundle\Controller\CustomerUserAddressController")</sup>
  > - `addressBookAction(Request $request, CustomerUser $customerUser)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerUserAddressController.php#L27 "Oro\Bundle\CustomerBundle\Controller\CustomerUserAddressController")</sup>

  > - `update(CustomerUser $customerUser, CustomerUserAddress $address)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Controller/CustomerUserAddressController.php#L79 "Oro\Bundle\CustomerBundle\Controller\CustomerUserAddressController")</sup>
  > - `update(Request $request, CustomerUser $customerUser, CustomerUserAddress $address)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/CustomerUserAddressController.php#L79 "Oro\Bundle\CustomerBundle\Controller\CustomerUserAddressController")</sup>

* The `ResetController::resetAction()`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/Controller/Frontend/ResetController.php#L80 "Oro\Bundle\CustomerBundle\Controller\Frontend\ResetController")</sup> method was changed to `ResetController::resetAction(Request $request)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/CustomerBundle/Controller/Frontend/ResetController.php#L80 "Oro\Bundle\CustomerBundle\Controller\Frontend\ResetController")</sup>
* The `CustomerRolePageListener::setRequest`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/CustomerRolePageListener.php#L31 "Oro\Bundle\CustomerBundle\EventListener\CustomerRolePageListener::setRequest")</sup> method was removed.
* The following methods in class `CustomerDatagridListener`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L60 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener")</sup> were removed:
   - `onBuildBeforeFrontendItems`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L60 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::onBuildBeforeFrontendItems")</sup>
   - `showAllCustomerItems`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L113 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::showAllCustomerItems")</sup>
   - `permissionShowAllCustomerItems`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L159 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::permissionShowAllCustomerItems")</sup>
   - `permissionShowAllCustomerItemsForChild`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L167 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::permissionShowAllCustomerItemsForChild")</sup>
   - `permissionShowCustomerUserColumn`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L176 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::permissionShowCustomerUserColumn")</sup>
* The `CustomerRolePageListener::$request`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/CustomerRolePageListener.php#L18 "Oro\Bundle\CustomerBundle\EventListener\CustomerRolePageListener::$request")</sup> property was removed.
* The following properties in class `CustomerDatagridListener`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L20 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener")</sup> were removed:
   - `$entityClass`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L20 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::$entityClass")</sup>
   - `$entityAlias`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L25 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::$entityAlias")</sup>
   - `$repository`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L35 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::$repository")</sup>
   - `$actionCallback`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/CustomerBundle/EventListener/Datagrid/CustomerDatagridListener.php#L40 "Oro\Bundle\CustomerBundle\EventListener\Datagrid\CustomerDatagridListener::$actionCallback")</sup>

FrontendBundle
--------------
* The `ClassMigration::isUpdateRequired(Connection $defaultConnection, $from, $to)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.6.0/src/Oro/Bundle/FrontendBundle/CacheWarmer/ClassMigration.php#L116 "Oro\Bundle\FrontendBundle\CacheWarmer\ClassMigration")</sup> method was changed to `ClassMigration::isUpdateRequired(Connection $defaultConnection, $from)`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/FrontendBundle/CacheWarmer/ClassMigration.php#L114 "Oro\Bundle\FrontendBundle\CacheWarmer\ClassMigration")</sup>

WebsiteBundle
-------------
* The `WebsiteProviderInterface::getWebsiteIds`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/3.0.0-beta/src/Oro/Bundle/WebsiteBundle/Provider/WebsiteProviderInterface.php#L17 "Oro\Bundle\WebsiteBundle\Provider\WebsiteProviderInterface::getWebsiteIds")</sup> interface method was added.
