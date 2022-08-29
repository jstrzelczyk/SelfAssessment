<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface;

class FaqDeleter implements FaqDeleterInterface
{
    private FaqEntityManagerInterface $faqEntityManager;

    public function __construct (FaqEntityManagerInterface $faqEntityManager)
    {
        $this->faqEntityManager = $faqEntityManager;
    }

    public function deleteFaq (FaqTransfer $faqTransfer) :void
    {
        $this->faqEntityManager->deleteFaq($faqTransfer);
    }

}
