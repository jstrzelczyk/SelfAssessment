<?php

namespace Pyz\Zed\Faq\Business\Faq;
use Generated\Shared\Transfer\FaqTransfer;

interface FaqSaverInterface
{
    /**
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function save(FaqTransfer $faqTransfer): FaqTransfer;
}
