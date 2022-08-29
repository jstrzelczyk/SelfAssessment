<?php
namespace Pyz\Zed\Faq\Business;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Faq\Business\FaqBusinessFactory getFactory()
 */

class FaqFacade extends AbstractFacade implements FaqFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FaqTransfer $faqTransfer
     *
     * @return \Generated\Shared\Transfer\FaqTransfer
     */
    public function saveFaq(FaqTransfer $faqTransfer): FaqTransfer
    {
        return $this->getFactory()
            ->createFaqSaver()
            ->save($faqTransfer);

    }

    public function deleteFaq (FaqTransfer $faqTransfer) :void
    {
        $this
            ->getFactory()
            ->createFaqDeleter()
            ->deleteFaq($faqTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        return $this->getFactory()
            ->createFaqReader()
            ->findFaqById($idFaq);
    }

}
