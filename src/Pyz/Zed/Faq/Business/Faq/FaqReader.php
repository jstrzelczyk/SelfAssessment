<?php
namespace Pyz\Zed\Faq\Business\Faq;

use Generated\Shared\Transfer\FaqCollectionTransfer;
use Generated\Shared\Transfer\FaqTransfer;
use Pyz\Zed\Faq\Persistence\FaqRepositoryInterface;

class FaqReader implements FaqReaderInterface
{
    /** @var \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface */
    private FaqRepositoryInterface $faqRepository;

    /**
     * @param \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface $faqRepository
     */
    public function __construct(FaqRepositoryInterface $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * @param int $idFaq
     *
     * @return \Generated\Shared\Transfer\FaqTransfer|null
     */
    public function findFaqById(int $idFaq): ?FaqTransfer
    {
        return $this->faqRepository->findFaqById($idFaq);
    }

    /**
     * @param \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     * @return \Generated\Shared\Transfer\FaqCollectionTransfer $faqsRestApiTransfer
     */
    public function getFaqCollection(FaqCollectionTransfer $faqsRestApiTransfer): FaqCollectionTransfer
    {
        return $this->faqRepository->getFaqCollection($faqsRestApiTransfer);
    }

    public function getFaq(FaqTransfer $faqRestApiTransfer): FaqTransfer
    {
        return $this->faqRepository->getFaq($faqRestApiTransfer);
    }

}
