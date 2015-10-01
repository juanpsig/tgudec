<?php

namespace TG\UdecBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use TG\UdecBundle\Entity\Archivostg;
use TG\UdecBundle\Form\ArchivostgType;

/**
 * Archivostg controller.
 *
 */
class ArchivostgController extends Controller
{

    /**
     * Lists all Archivostg entities.
     *
     */
    public function indexAction()
    {
        //echo 'hola2';
        // la variable $em es la encargada de realizar conexion
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TGUdecBundle:Archivostg')->findAll();

        return $this->render('TGUdecBundle:Archivostg:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Archivostg entity.
     *
     */
    public function createAction(Request $request)
    {
        //echo 'sali';exit();
        $entity = new Archivostg();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dir = "adjuntos/";
            $em = $this->getDoctrine()->getManager();
            $filename=time();
            $resumen = $form['resumen']->getData();
			if($resumen){
				$resumen->move($dir, $filename.'_'.$resumen->getClientOriginalName());
				$dirResumen = $filename.'_'.$resumen->getClientOriginalName();
				$entity->setResumen($dirResumen);
			}
            
            $abstrc = $form['abstrc']->getData();
            if($abstrc){
				$abstrc->move($dir, $filename.'_'.$abstrc->getClientOriginalName());
				$dirAbstrc = $filename.'_'.$abstrc->getClientOriginalName();
				$entity->setAbstrc($dirAbstrc);
			}
            
            $articulo = $form['articulo']->getData();
			if($articulo){
				$articulo->move($dir, $filename.'_'.$articulo->getClientOriginalName());
				$dirarticulo = $filename.'_'.$articulo->getClientOriginalName();
				$entity->setArticulo($dirarticulo);
			}
            
            $doc = $form['doc']->getData();
			if($doc){
				$doc->move($dir, $filename.'_'.$doc->getClientOriginalName());
				$dirdoc = $filename.'_'.$doc->getClientOriginalName();
				$entity->setDoc($dirdoc);
			}
            
            $manualTecn = $form['manualTecn']->getData();
			if($manualTecn){
				$manualTecn->move($dir, $filename.'_'.$manualTecn->getClientOriginalName());
				$dirmanualTecn = $filename.'_'.$manualTecn->getClientOriginalName();
				$entity->setManualTecn($dirmanualTecn);
			}
            
            $manualUsr = $form['manualUsr']->getData();
			if($manualUsr){
				$manualUsr->move($dir, $filename.'_'.$manualUsr->getClientOriginalName());
				$dirmanualUsr = $filename.'_'.$manualUsr->getClientOriginalName();
				$entity->setManualUsr($dirmanualUsr);
            }
			
            $codigoSw = $form['codigoSw']->getData();
            if($codigoSw){
				$codigoSw->move($dir, $filename.'_'.$codigoSw->getClientOriginalName());
				$dircodigoSw= $filename.'_'.$codigoSw->getClientOriginalName();
				$entity->setCodigoSw($dircodigoSw);
			}
            
            $software = $form['software']->getData();
			if($software){
				$software->move($dir, $filename.'_'.$software->getClientOriginalName());
				$dirsoftware= $filename.'_'.$software->getClientOriginalName();
				$entity->setSoftware($dirsoftware);
			}
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('archivostg_show', array('id' => $entity->getId())));
        }

        return $this->render('TGUdecBundle:Archivostg:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Archivostg entity.
     *
     * @param Archivostg $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Archivostg $entity)
    {
        //trabajando aca
        $form = $this->createForm(new ArchivostgType(), $entity, array(
            'action' => $this->generateUrl('archivostg_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Archivostg entity.
     *
     */
    public function newAction()
    {
        $entity = new Archivostg();
        $form   = $this->createCreateForm($entity);

        return $this->render('TGUdecBundle:Archivostg:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Archivostg entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Archivostg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Archivostg entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Archivostg:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Archivostg entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Archivostg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Archivostg entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TGUdecBundle:Archivostg:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Archivostg entity.
    *
    * @param Archivostg $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Archivostg $entity)
    {
        $form = $this->createForm(new ArchivostgType(), $entity, array(
            'action' => $this->generateUrl('archivostg_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Archivostg entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TGUdecBundle:Archivostg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Archivostg entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('archivostg_edit', array('id' => $id)));
        }

        return $this->render('TGUdecBundle:Archivostg:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Archivostg entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TGUdecBundle:Archivostg')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Archivostg entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('archivostg'));
    }

    /**
     * Creates a form to delete a Archivostg entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('archivostg_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function listarAction($id)
    {
        //echo 'listar '.$id;exit();

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TGUdecBundle:Archivostg')->findBy(array('idTrabajo' => $id));

        return $this->render('TGUdecBundle:Archivostg:index.html.twig', array(
            'entities' => $entities,
        ));

    }
}
