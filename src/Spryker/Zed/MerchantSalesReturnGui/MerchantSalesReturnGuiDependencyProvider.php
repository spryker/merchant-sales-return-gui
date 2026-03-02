<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\MerchantSalesReturnGui;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\MerchantSalesReturnGui\Dependency\Facade\MerchantSalesReturnGuiToMerchantSalesOrderFacadeBridge;

/**
 * @method \Spryker\Zed\MerchantSalesReturnGui\MerchantSalesReturnGuiConfig getConfig()
 */
class MerchantSalesReturnGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_MERCHANT_SALES_ORDER = 'FACADE_MERCHANT_SALES_ORDER';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addMerchantSalesOrderFacade($container);

        return $container;
    }

    protected function addMerchantSalesOrderFacade(Container $container): Container
    {
        $container->set(static::FACADE_MERCHANT_SALES_ORDER, function (Container $container) {
            return new MerchantSalesReturnGuiToMerchantSalesOrderFacadeBridge($container->getLocator()->merchantSalesOrder()->facade());
        });

        return $container;
    }
}
