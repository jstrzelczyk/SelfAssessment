<?php

namespace Pyz\Client\FaqsRestApi\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class FaqsRestApiZedStub implements FaqsRestApiZedStubInterface
{
    /**
     * @var \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \Spryker\Client\ZedRequest\ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer
    {
        /** @var \Generated\Shared\Transfer\FaqCollectionTransfer $faqCollectionTransfer */
        $faqCollectionTransfer = $this->zedRequestClient->call('/faq/gateway/get-faq-collection', $faqCollectionTransfer);

        return $faqCollectionTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function getFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        /** @var \Generated\Shared\Transfer\FaqTransfer $faqTransfer */

        $faqTransfer = $this->zedRequestClient->call('/faq/gateway/get-faq', $faqTransfer);

        return $faqTransfer;
    }
}
