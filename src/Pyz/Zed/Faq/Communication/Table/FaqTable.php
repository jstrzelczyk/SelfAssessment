<?php
namespace Pyz\Zed\Faq\Communication\Table;
use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Orm\Zed\Faq\Persistence\Map\PyzFaqTableMap;
use Spryker\Service\UtilText\Model\Url\Url;

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
            PyzFaqTableMap::COL_STATUS => 'Status',
            self::COL_ACTIONS => 'Action'
        ]);

        $config->setSortable([
            PyzFaqTableMap::COL_QUESTION,
            PyzFaqTableMap::COL_ANSWER,
            PyzFaqTableMap::COL_STATUS
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
                PyzFaqTableMap::COL_STATUS =>
                    $faqDataItem[PyzFaqTableMap:: COL_STATUS],
//                self::COL_ACTIONS => $this->generateEditButton('/faq/edit?id-faq='.$faqDataItem[PyzFaqTableMap::COL_ID_FAQ],'Edit')
                static::COL_ACTIONS => $this->getActionButtons($faqDataItem[PyzFaqTableMap::COL_ID_FAQ]),
            ];
        }
        return $faqTableRows;
    }

    protected function createEditButton (string $faqId): string
    {
        $editFaqUrl = Url::generate(
            '/faq/edit',
            [
                'id-faq' => $faqId,
            ],
        );

        return $this->generateEditButton($editFaqUrl, 'Edit');
    }

    protected function createDeleteButton (string $faqId): string
    {
        $deleteFaqUrl = Url::generate(
            '/faq/delete',
            [
                'id-faq' => $faqId,
            ],
        );

        return $this->generateRemoveButton($deleteFaqUrl, 'Delete');
    }

    protected function getActionButtons (string $faqId) :string
    {
        $buttons = [];
        $buttons[] = $this->createEditButton($faqId);
        $buttons[] = $this->createDeleteButton($faqId);

        return implode(' ', $buttons);
    }


}
