<?php

namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     *
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     */
    public function getFaqCollectionAction(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        return $this->getFacade()->getFaqCollection($faqsRestApiTransfer);
    }
}
