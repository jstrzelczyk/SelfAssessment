<?php
namespace Pyz\Zed\Faq\Communication\Controller;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @method \Pyz\Zed\Faq\Communication\FaqCommunicationFactory getFactory()
 */
class ListController extends AbstractController
{
    /**
     * @return array
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function indexAction(): array
    {
        $faqTable = $this->getFactory()->createFaqTable();
        return $this->viewResponse([
            'faqTable' => $faqTable->render()
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function tableAction(): JsonResponse
    {
        $faqTable = $this->getFactory()->createFaqTable();

        return $this->jsonResponse($faqTable->fetchData());
    }
}
