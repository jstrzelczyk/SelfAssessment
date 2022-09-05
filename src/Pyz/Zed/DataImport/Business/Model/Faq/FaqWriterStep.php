<?php

namespace Pyz\Zed\DataImport\Business\Model\Faq;

use Orm\Zed\Faq\Persistence\PyzFaqQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class FaqWriterStep extends PublishAwareStep implements DataImportStepInterface
{
    public const KEY_QUESTION = 'question';
    public const KEY_ANSWER = 'answer';
    public const KEY_STATUS = 'status';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     * @throws \Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     */
    public function execute(DataSetInterface $dataSet)
    {
        $faqEntity = PyzFaqQuery::create()
            ->filterByQuestion($dataSet[static::KEY_QUESTION])
            ->findOneOrCreate();

        $faqEntity->setAnswer
        ($dataSet[static::KEY_ANSWER]);

        $faqEntity->setStatus($dataSet[static::KEY_STATUS]);
        if ($faqEntity->isNew() || $faqEntity->isModified()) {
            $faqEntity->save();
        }
    }
}
