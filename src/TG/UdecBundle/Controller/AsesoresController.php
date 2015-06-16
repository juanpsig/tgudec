<?php

namespace TG\UdecBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TG\UdecBundle\Entity\Asesores;
use TG\UdecBundle\Form\AsesoresType;

/**
 * Asesores controller.
 *
 */
class AsesoresController extends Controller
{

    /**
     * Lists all Asesores entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TGUdecBundle:Asesores')->findAll();

        return $this->render('TGUdecBundle:Asesores:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Asesores entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Asesores();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('asesores_show', array('id' => $entity->getId())));
        }

        return $this->render('TGUdecBundle:Asesores:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Asesores entity.
     *
     * @param Asesores $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Asesores $entity)
    {
        $form = $this->createForm(new AsesoresType(), $entity, array(
            'action' => $this->generateUrl('asesores_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Asesores entity.
     *
     */
    public function newAction()
    {
        $entity = new Asesores();
        $form   = $this->createCreateForm($entity);

        return $this->render('TGUdecBundle:Asesores:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Asesores entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Asesores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asesores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Asesores:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Asesores entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Asesores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asesores entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Asesores:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Asesores entity.
    *
    * @param Asesores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Asesores $entity)
    {
        $form = $this->createForm(new AsesoresType(), $entity, array(
            'action' => $this->generateUrl('asesores_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Asesores entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Asesores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asesores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('asesores_edit', array('id' => $id)));
        }

        return $this->render('TGUdecBundle:Asesores:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Asesores entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TGUdecBundle:Asesores')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Asesores entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('asesores'));
    }

    /**
     * Creates a form to delete a Asesores entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('asesores_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
