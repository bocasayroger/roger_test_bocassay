<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Detailcommande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Detailcommande controller.
 *
 * @Route("detailcommande")
 */
class DetailcommandeController extends Controller
{
    /**
     * Lists all detailcommande entities.
     *
     * @Route("/", name="detailcommande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detailcommandes = $em->getRepository('AppBundle:Detailcommande')->findAll();

        return $this->render('detailcommande/index.html.twig', array(
            'detailcommandes' => $detailcommandes,
        ));
    }

    /**
     * Creates a new detailcommande entity.
     *
     * @Route("/new", name="detailcommande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $detailcommande = new Detailcommande();
        $form = $this->createForm('AppBundle\Form\DetailcommandeType', $detailcommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detailcommande);
            $em->flush();

            return $this->redirectToRoute('detailcommande_show', array('id' => $detailcommande->getId()));
        }

        return $this->render('detailcommande/new.html.twig', array(
            'detailcommande' => $detailcommande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detailcommande entity.
     *
     * @Route("/{id}", name="detailcommande_show")
     * @Method("GET")
     */
    public function showAction(Detailcommande $detailcommande)
    {
        $deleteForm = $this->createDeleteForm($detailcommande);

        return $this->render('detailcommande/show.html.twig', array(
            'detailcommande' => $detailcommande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detailcommande entity.
     *
     * @Route("/{id}/edit", name="detailcommande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Detailcommande $detailcommande)
    {
        $deleteForm = $this->createDeleteForm($detailcommande);
        $editForm = $this->createForm('AppBundle\Form\DetailcommandeType', $detailcommande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detailcommande_edit', array('id' => $detailcommande->getId()));
        }

        return $this->render('detailcommande/edit.html.twig', array(
            'detailcommande' => $detailcommande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detailcommande entity.
     *
     * @Route("/{id}", name="detailcommande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Detailcommande $detailcommande)
    {
        $form = $this->createDeleteForm($detailcommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detailcommande);
            $em->flush();
        }

        return $this->redirectToRoute('detailcommande_index');
    }

    /**
     * Creates a form to delete a detailcommande entity.
     *
     * @param Detailcommande $detailcommande The detailcommande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Detailcommande $detailcommande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detailcommande_delete', array('id' => $detailcommande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
