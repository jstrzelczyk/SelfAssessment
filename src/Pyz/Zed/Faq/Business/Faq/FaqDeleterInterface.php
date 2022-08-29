<?php

namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqDeleterInterface
{
    public function deleteFaq (FaqTransfer $faq) :void;
}
