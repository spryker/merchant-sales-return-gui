<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\MerchantSalesReturnGui\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\MerchantSalesReturnGui\Communication\Form\DataProvider\MerchantSalesReturnCreateFormDataProvider;
use Spryker\Zed\MerchantSalesReturnGui\Communication\Form\Handler\MerchantSalesReturnCreateFormHandler;
use Spryker\Zed\MerchantSalesReturnGui\Communication\Form\Handler\MerchantSalesReturnCreateFormHandlerInterface;
use Spryker\Zed\MerchantSalesReturnGui\Communication\Form\MerchantSalesReturnCreateForm;
use Spryker\Zed\MerchantSalesReturnGui\Communication\Reader\MerchantSalesReturnReader;
use Spryker\Zed\MerchantSalesReturnGui\Communication\Reader\MerchantSalesReturnReaderInterface;
use Spryker\Zed\MerchantSalesReturnGui\Dependency\Facade\MerchantSalesReturnGuiToMerchantSalesOrderFacadeInterface;
use Spryker\Zed\MerchantSalesReturnGui\MerchantSalesReturnGuiDependencyProvider;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @method \Spryker\Zed\MerchantSalesReturnGui\MerchantSalesReturnGuiConfig getConfig()
 */
class MerchantSalesReturnGuiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Spryker\Zed\MerchantSalesReturnGui\Communication\Form\DataProvider\MerchantSalesReturnCreateFormDataProvider
     */
    public function createMerchantSalesReturnCreateFormDataProvider(): MerchantSalesReturnCreateFormDataProvider
    {
        return new MerchantSalesReturnCreateFormDataProvider(
            $this->getMerchantSalesOrderFacade(),
        );
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface
     */
    public function createMerchantSalesReturnCreateForm(): FormTypeInterface
    {
        return new MerchantSalesReturnCreateForm();
    }

    /**
     * @return \Spryker\Zed\MerchantSalesReturnGui\Communication\Form\Handler\MerchantSalesReturnCreateFormHandlerInterface
     */
    public function createMerchantSalesReturnCreateFormHandler(): MerchantSalesReturnCreateFormHandlerInterface
    {
        return new MerchantSalesReturnCreateFormHandler();
    }

    /**
     * @deprecated Will be removed without replacement.
     *
     * @return \Spryker\Zed\MerchantSalesReturnGui\Communication\Reader\MerchantSalesReturnReaderInterface
     */
    public function createMerchantSalesReturnReader(): MerchantSalesReturnReaderInterface
    {
        return new MerchantSalesReturnReader($this->getMerchantSalesOrderFacade());
    }

    /**
     * @return \Spryker\Zed\MerchantSalesReturnGui\Dependency\Facade\MerchantSalesReturnGuiToMerchantSalesOrderFacadeInterface
     */
    public function getMerchantSalesOrderFacade(): MerchantSalesReturnGuiToMerchantSalesOrderFacadeInterface
    {
        return $this->getProvidedDependency(MerchantSalesReturnGuiDependencyProvider::FACADE_MERCHANT_SALES_ORDER);
    }
}
