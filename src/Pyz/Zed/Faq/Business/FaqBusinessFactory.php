<?php
namespace Pyz\Zed\Faq\Business;

use Pyz\Zed\Faq\Business\Faq\FaqReader;
use Pyz\Zed\Faq\Business\Faq\FaqSaver;
use Pyz\Zed\Faq\Business\Faq\FaqSaverInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Pyz\Zed\Faq\Business\Faq\FaqReaderInterface;

/**
 * @method \Pyz\Zed\Faq\Persistence\FaqEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\Faq\Persistence\FaqRepositoryInterface getRepository()
 */
class FaqBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqSaverInterface
     */
    public function createFaqSaver(): FaqSaverInterface
    {
        return new FaqSaver(
            $this->getEntityManager()
        );
    }

    /**
     * @return \Pyz\Zed\Faq\Business\Faq\FaqReaderInterface
     */
    public function createFaqReader(): FaqReaderInterface
    {
        return new FaqReader(
            $this->getRepository()
        );
    }

}
