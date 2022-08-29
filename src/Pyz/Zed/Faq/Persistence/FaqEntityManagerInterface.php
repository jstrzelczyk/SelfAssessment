<?php
namespace Pyz\Zed\Faq\Persistence;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer;
}
