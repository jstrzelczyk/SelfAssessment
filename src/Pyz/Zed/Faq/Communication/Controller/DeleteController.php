<?php
namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */
class DeleteController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {

        try {
            $idFaq = $this->castId($request->query->get('id-faq'));
        }
        catch(\Exception $e) {
            $this->addErrorMessage('There is no FAQ id provided');
            return $this->redirectResponse('/faq/list');
        }

        $faqTransfer = $this->getFacade()->findFaqById($idFaq);

        if ($faqTransfer === null) {
            $this->addErrorMessage('There is no FAQ with provided Id.');

            return $this->redirectResponse('/faq/list');
        }

        $this->getFacade()
            ->deleteFaq($faqTransfer);

        $this->addInfoMessage('FAQ has been deleted');

        return $this->redirectResponse('/faq/list');

        }


}
