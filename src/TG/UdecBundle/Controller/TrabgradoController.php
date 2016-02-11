<?php

namespace TG\UdecBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;

use TG\UdecBundle\Entity\Trabgrado;
use TG\UdecBundle\Form\TrabgradoType;

/**
 * Trabgrado controller.
 *
 */
class TrabgradoController extends Controller
{

    /**
     * Lists all Trabgrado entities.
     *
     */
    public function indexAction()
    {
        //echo 'hola';exit;
       $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('TGUdecBundle:Trabgrado')->findAll();
        
        
        $sql="select t.*,c.nombre, p.id idprog from trabgrado t
        inner join clasificaciontg c on t.id_clasificacion=c.id
        inner join programas p on t.id_programa=p.id";

        //$con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con = $em->getConnection()->prepare($sql);
        
        $con->execute();
          $entities = $con->fetchAll(); 
        

        return $this->render('TGUdecBundle:Trabgrado:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function adjuntarAction($id){
        $em = $this->getDoctrine()->getManager();
        $serializer = SerializerBuilder::create()->build();
        $data['mensaje']='success';
        $jsonContent = $serializer->serialize($data, 'json');
        return new Response($jsonContent);
    }
    /**
     * Creates a new Trabgrado entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Trabgrado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('trabgrado_show', array('id' => $entity->getId())));
        }

        return $this->render('TGUdecBundle:Trabgrado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Trabgrado entity.
     *
     * @param Trabgrado $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Trabgrado $entity)
    {
        $form = $this->createForm(new TrabgradoType(), $entity, array(
            'action' => $this->generateUrl('trabgrado_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Trabgrado entity.
     *
     */
    public function newAction()
    {
        $entity = new Trabgrado();
        $form   = $this->createCreateForm($entity);

        return $this->render('TGUdecBundle:Trabgrado:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Trabgrado entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Trabgrado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trabgrado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Trabgrado:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Trabgrado entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Trabgrado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trabgrado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Trabgrado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Trabgrado entity.
    *
    * @param Trabgrado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Trabgrado $entity)
    {
        $form = $this->createForm(new TrabgradoType(), $entity, array(
            'action' => $this->generateUrl('trabgrado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Trabgrado entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Trabgrado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trabgrado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('trabgrado_edit', array('id' => $id)));
        }

        return $this->render('TGUdecBundle:Trabgrado:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Trabgrado entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TGUdecBundle:Trabgrado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Trabgrado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('trabgrado'));
    }

    /**
     * Creates a form to delete a Trabgrado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trabgrado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
