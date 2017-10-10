<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Url;
use AppBundle\Form\UrlForm;
use AppBundle\Service\ClickService;
use AppBundle\Service\UrlService;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * This is the default landing page
     *
     * @Route("/", name="homepage")
     */
    public function indexAction(
        Request $request,
        EntityManagerInterface $em,
        UrlService $service
    ) {
        $url = $service->createEntity($request->getClientIp(), $this->getUser());
        $form = $this->createForm(UrlForm::class, $url, [
            'can_customize' => $this->isGranted('ROLE_CAN_CUSTOMIZE_URLS'),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($url);
            $em->flush();

            return $this->redirectToRoute('edit', [
                'url' => $url->getShort(),
                'token' => $url->getEditToken(),
            ]);
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
            'total_urls' => $em->getRepository('AppBundle:Url')->countTotalUrls(),
            'total_clicks' => $em->getRepository('AppBundle:Click')->countTotalClicks(),
        ]);
    }

    /**
     * Url edit page
     *
     * @Route("/edit/{url}/{token}", name="edit")
     *
     * @ParamConverter(name="url", options={"repository_method"="getByShortUrl"})
     */
    public function editAction(Url $url, string $token)
    {
        if ($url->getEditToken() !== $token) {
            throw new $this->createAccessDeniedException();
        }

        return $this->render('default/edit.html.twig', [
            'url' => $url,
        ]);
    }

    /**
     * Actual URL page which follows the link
     *
     * @Route("/{url}", name="redirect")
     *
     * @ParamConverter(name="url", options={"repository_method"="getByShortUrl"})
     */
    public function redirectAction(
        Request $request,
        Url $url,
        ClickService $service,
        EntityManagerInterface $em
    ) {
        $click = $service->registerClick($url, $request->getClientIp());
        $em->persist($click);
        $em->flush();

        return $this->redirect($url->getFull());
    }
}
