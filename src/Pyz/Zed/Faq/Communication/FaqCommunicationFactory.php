<?php
namespace Pyz\Zed\Faq\Communication;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Pyz\Zed\Faq\FaqDependencyProvider;
use Pyz\Zed\Faq\Communication\Table\FaqTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class FaqCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Pyz\Zed\Faq\Communication\Table\FaqTable
     *
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createFaqTable(): FaqTable
    {
        return new FaqTable($this->getFaqPropelQuery());
    }
    /**
     * @return \Orm\Zed\Faq\Persistence\PyzFaqQuery
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    private function getFaqPropelQuery(): PyzFaqQuery
    {
        return $this->getProvidedDependency(FaqDependencyProvider::QUERY_FAQ);
    }
}
