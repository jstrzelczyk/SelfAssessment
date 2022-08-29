<?php
namespace Pyz\Zed\Faq\Communication\Controller;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */
class EditController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idFaq = $this->castId($request->query->get('id-faq'));
        $faq = $this->getFacade()
            ->findFaqById($idFaq);
        if(is_null($faq)){
            $this->addErrorMessage('FAQ with given id not exists.');
            return $this->redirectResponse('/faq/list');
        }
        $faqTransfer = (new FaqTransfer())
            ->setIdFaq($idFaq)
            ->setQuestion($faq->getQuestion())
            ->setAnswer($faq->getAnswer());
        $faqForm = $this->getFactory()
            ->createFaqForm($faqTransfer)
            ->handleRequest($request);



        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->getFacade()
                ->saveFaq($faqForm->getData());
            $this->addSuccessMessage('FAQ was updated');

            return $this->redirectResponse('/faq/list');

        }



        return $this->viewResponse([

            'faqForm' => $faqForm->createView()

        ]);
    }
}
