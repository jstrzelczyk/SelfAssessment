<?php

namespace Pyz\Client\Faq\Zed;

use Generated\Shared\Transfer\FaqCollectionTransfer;

interface FaqZedStubInterface
{
    public function getFaqCollection(FaqCollectionTransfer $faqCollectionTransfer): FaqCollectionTransfer;
}
