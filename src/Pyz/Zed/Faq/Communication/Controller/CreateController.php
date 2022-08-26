<?php
namespace Pyz\Zed\Faq\Communication\Controller;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 * @method \Pyz\Zed\Faq\Business\FaqFacadeInterface getFacade()
 */
class CreateController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {$faqForm = $this->getFactory()
        ->createFaqForm()
        ->handleRequest($request);

        if ($faqForm->isSubmitted() && $faqForm->isValid()) {
            $this->getFacade()
                ->saveFaq($faqForm->getData());
            $this->addSuccessMessage('FAQ was created.');

            return $this->redirectResponse('/faq/list');
        }

        return $this->viewResponse([
            'faqForm' => $faqForm->createView()
        ]);

    }
}
