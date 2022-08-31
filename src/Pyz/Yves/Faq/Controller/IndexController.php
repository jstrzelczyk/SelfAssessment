<?php

namespace Pyz\Yves\Faq\Controller;

use Pyz\Client\Faq\FaqClientInterface;
use Generated\Shared\Transfer\FaqCollectionTransfer;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Yves\Kernel\View\View;

/**
 * @method \Pyz\Client\Faq\FaqClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(Request $request)
    {
        $faqTransfer = new FaqCollectionTransfer();
        $faqTransfer = $this->getClient()->getFaqCollection($faqTransfer);
        $data = ['faqs' => $faqTransfer->getFaqs()];

        return $this->view(
            $data,
            [],
            '@Faq/views/index/index.twig'
        );
    }
}
