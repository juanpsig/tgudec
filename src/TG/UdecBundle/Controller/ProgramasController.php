<?php

namespace TG\UdecBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TG\UdecBundle\Entity\Programas;
use TG\UdecBundle\Form\ProgramasType;

/**
 * Programas controller.
 *
 */
class ProgramasController extends Controller
{

    /**
     * Lists all Programas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TGUdecBundle:Programas')->findAll();

        return $this->render('TGUdecBundle:Programas:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Programas entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Programas();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('programas_show', array('id' => $entity->getId())));
        }

        return $this->render('TGUdecBundle:Programas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Programas entity.
     *
     * @param Programas $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Programas $entity)
    {
        $form = $this->createForm(new ProgramasType(), $entity, array(
            'action' => $this->generateUrl('programas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Programas entity.
     *
     */
    public function newAction()
    {
        $entity = new Programas();
        $form   = $this->createCreateForm($entity);

        return $this->render('TGUdecBundle:Programas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Programas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Programas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Programas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Programas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Programas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Programas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Programas entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Programas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Programas entity.
    *
    * @param Programas $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Programas $entity)
    {
        $form = $this->createForm(new ProgramasType(), $entity, array(
            'action' => $this->generateUrl('programas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Programas entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Programas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Programas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('programas_edit', array('id' => $id)));
        }

        return $this->render('TGUdecBundle:Programas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Programas entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TGUdecBundle:Programas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Programas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('programas'));
    }

    /**
     * Creates a form to delete a Programas entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('programas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
