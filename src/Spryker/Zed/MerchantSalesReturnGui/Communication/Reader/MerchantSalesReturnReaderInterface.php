<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\MerchantSalesReturnGui\Communication\Reader;

use ArrayObject;
use Generated\Shared\Transfer\OrderTransfer;

interface MerchantSalesReturnReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \ArrayObject<int, \Generated\Shared\Transfer\MerchantOrderTransfer>
     */
    public function getMerchantOrders(OrderTransfer $orderTransfer): ArrayObject;
}
