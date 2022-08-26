<?php
namespace Pyz\Zed\Faq\Communication\Table;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\Faq\Persistence\Map\PyzFaqTableMap;

class FaqTable extends AbstractTable
{
    public const COL_ACTIONS = 'Action';
    /** @var \Orm\Zed\Faq\Persistence\PyzFaqQuery */
    private PyzFaqQuery $faqQuery;
    /**
     * @param \Orm\Zed\Faq\Persistence\PyzFaqQuery $faqQuery
     */
    public function __construct(PyzFaqQuery $faqQuery)
    {
        $this->faqQuery = $faqQuery;
    }

    /**
     * @inheritDoc
     */
    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzFaqTableMap::COL_QUESTION => 'Question',
            PyzFaqTableMap::COL_ANSWER => 'Answer',
            self::COL_ACTIONS => 'Action'
        ]);

        $config->setSortable([
            PyzFaqTableMap::COL_QUESTION,
            PyzFaqTableMap::COL_ANSWER
        ]);

        $config->setSearchable([
            PyzFaqTableMap::COL_QUESTION
        ]);

        $config->setRawColumns([
            self::COL_ACTIONS
        ]);

        return $config;
    }
    /**
     * @inheritDoc
     */
    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration
    $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $faqDataItems = $this->runQuery($this->faqQuery,
            $config);
        $faqTableRows = [];
        foreach ($faqDataItems as $faqDataItem) {
            $faqTableRows[] = [
                PyzFaqTableMap::COL_QUESTION =>
                    $faqDataItem[PyzFaqTableMap::COL_QUESTION],
                PyzFaqTableMap::COL_ANSWER =>
                    $faqDataItem[PyzFaqTableMap:: COL_ANSWER],
                self::COL_ACTIONS => $this->generateEditButton('/faq/edit?id-faq='.$faqDataItem[PyzFaqTableMap::COL_ID_FAQ],'Edit')
            ];
        }
        return $faqTableRows;
    }

//    protected function generateItemButtons($planetItem) {
//        $btnGroup = [];
//        $btnGroup[] = $this->createButtonGroupItem(
//            "Edit",
//            "/planet/edit?name={$planetItem[PyzPlanetTableMap::COL_NAME]}"
//        );
//        $btnGroup[] = $this->createButtonGroupItem(
//            "Delete",
//            "/planet/delete?name={$planetItem[PyzPlanetTableMap::COL_NAME]}"
//        );
//        return $this->generateButtonGroup(
//            $btnGroup,
//            'Actions'
//        );
//    }
}
