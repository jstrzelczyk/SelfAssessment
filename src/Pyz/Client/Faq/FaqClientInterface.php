<?php

namespace Pyz\Client\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqClientInterface
{
    /**
     * @api
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
//    public function getFaqEntity(FaqTransfer $trans): ?FaqTransfer;
}
