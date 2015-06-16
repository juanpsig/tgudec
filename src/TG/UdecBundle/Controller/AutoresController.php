<?php

namespace TG\UdecBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TG\UdecBundle\Entity\Autores;
use TG\UdecBundle\Form\AutoresType;

/**
 * Autores controller.
 *
 */
class AutoresController extends Controller
{

    /**
     * Lists all Autores entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TGUdecBundle:Autores')->findAll();

        return $this->render('TGUdecBundle:Autores:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Autores entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Autores();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('autores_show', array('id' => $entity->getId())));
        }

        return $this->render('TGUdecBundle:Autores:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Autores entity.
     *
     * @param Autores $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Autores $entity)
    {
        $form = $this->createForm(new AutoresType(), $entity, array(
            'action' => $this->generateUrl('autores_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Autores entity.
     *
     */
    public function newAction()
    {
        $entity = new Autores();
        $form   = $this->createCreateForm($entity);

        return $this->render('TGUdecBundle:Autores:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Autores entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Autores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Autores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Autores:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Autores entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Autores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Autores entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Autores:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Autores entity.
    *
    * @param Autores $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Autores $entity)
    {
        $form = $this->createForm(new AutoresType(), $entity, array(
            'action' => $this->generateUrl('autores_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Autores entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Autores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Autores entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('autores_edit', array('id' => $id)));
        }

        return $this->render('TGUdecBundle:Autores:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Autores entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TGUdecBundle:Autores')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Autores entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('autores'));
    }

    /**
     * Creates a form to delete a Autores entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('autores_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
