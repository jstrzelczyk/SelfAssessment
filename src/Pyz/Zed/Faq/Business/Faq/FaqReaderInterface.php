<?php
namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqTransfer;

interface FaqReaderInterface
{
    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer;
}
