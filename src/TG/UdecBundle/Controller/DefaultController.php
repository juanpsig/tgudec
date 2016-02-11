<?php

namespace TG\UdecBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use JMS\Serializer\SerializerBuilder;


class DefaultController extends Controller
{
    public function indexAction(){
        //echo 'hola';exit();
        /*$serializer = SerializerBuilder::create()->build();
        $data['mensaje']='success';
        $jsonContent = $serializer->serialize($data, 'json');
        //return new Response($jsonContent);
        return $this->render('TGUdecBundle:Default:index.html.twig');*/
        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('TGUdecBundle:Trabgrado')->findAll();
        
		
        $sql="select t.*,c.nombre, p.id idprog, ps.primer_nombre from trabgrado t
        inner join clasificaciontg c on t.id_clasificacion=c.id
        inner join programas p on t.id_programa=p.id
        inner join autores a on t.id=a.id_trabajo
        inner join personas ps on a.id_persona=ps.id
		 group by  t.id";

        //$con = $this->getDoctrine()->getManager()->getConnection()->prepare($sql);
        $con = $em->getConnection()->prepare($sql);
        
        $con->execute();
        $entities = $con->fetchAll(); 
        
        

        return $this->render('TGUdecBundle:Trabgrado:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function fileAction($name){
        $file = 'adjuntos/'.$name;
        return new BinaryFileResponse($file);
        //return new Response($file);
        //$response = new BinaryFileResponse($file);
    }
	public function buscarProyectosAction(Request $rqt){
		$txt = $rqt->get('buscadorProyectos');
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery("SELECT u FROM TGUdecBundle:Trabgrado u 
                                        WHERE u.titulo LIKE'%$txt%' ORDER BY u.id");
        $entities = $query->getResult();
		//$entities = $em->getRepository('TGUdecBundle:Trabgrado')->findAll();
		return $this->render('TGUdecBundle:Trabgrado:index.html.twig', array(
            'entities' => $entities,
        ));
	}






    /* ejemplo
    public function getMiembroAction($idMrm){
        $request = $this->get('request');
        $session = $request->getSession();
        $serializer = SerializerBuilder::create()->build();
        $data = array('mensaje'=>'');
        if($session->get('Token')){
            $Miembro = $this->getDoctrine()->getRepository('MRMApiBundle:MrmMiembros')->find($idMrm);
            if($Miembro){
                $data['mensaje']='success';
                $xMiembroData = array('idMrm'=>$idMrm,'numeroDocumento'=>$Miembro->getMiecMieNumeroDocumento(),
                                'apellido1'=>$Miembro->getMiecMieApellido1(),
                                'apellido2'=>$Miembro->getMiecMieApellido2(),
                                'nombre1'=>$Miembro->getMiecMieNombre1(),
                                'nombre2'=>$Miembro->getMiecMieNombre2(),
                                'fechaNacimiento'=>$Miembro->getMiedMieFechaNacimiento()->format("Y-m-d"),
                                'genero'=>$Miembro->getMiecMieGenero(),
                                'tipoDoc'=>array('id'=>$Miembro->getGeniTipdoc()->getGeniTipdocId(),'descripcion'=>$Miembro->getGeniTipdoc()->getGencTipdocAbreviatura()),
                                'estadoCivil'=>array('id'=>$Miembro->getGeniEstciv()->getGeniEstcivId(),'descripcion'=>$Miembro->getGeniEstciv()->getGencEstcivDescripcion()),
                                'NivelEdu'=>array('id'=>$Miembro->getGeniNivedu()->getGeniNiveduId(),'descripcion'=>$Miembro->getGeniNivedu()->getGencNiveduDescripcion()),
                                'Ciudad'=>array('id'=>$Miembro->getGeniCiu()->getGeniCiuId(),'descripcion'=>$Miembro->getGeniCiu()->getGencCiuNombre())
                                );
                // datos de contacto
                $arTels = array();
                $arDirs = array();
                $arMals = array();
                $tels = $this->getDoctrine()->getRepository('MRMApiBundle:MrmTelefonos')->findBy(array('mieiMie'=>$idMrm));
                if($tels){
                    foreach($tels as $xtel){
                        if($xtel->getGeniCiu()){
                            $arTels[]=array('idMrm'=>$xtel->getMieiTelId(),'Ciudad'=>array('id'=>$xtel->getGeniCiu()->getGeniCiuId(),'descripcion'=>$xtel->getGeniCiu()->getGencCiuNombre()),'tipo'=>array('id'=>$xtel->getGeniIcoubiId()->getGeniIcoubiId(),'descripcion'=>$xtel->getGeniIcoubiId()->getGencIcoubiDescripcion()),'telefono'=>$xtel->getMiecTelTelefono(),'principal'=>$xtel->getMiebTelPrincipal(),'activo'=>$xtel->getMiebTelActivo());
                        }else{
                            $arTels[]=array('idMrm'=>$xtel->getMieiTelId(),'Ciudad'=>array('id'=>'null','descripcion'=>'null'),'tipo'=>array('id'=>$xtel->getGeniIcoubiId()->getGeniIcoubiId(),'descripcion'=>$xtel->getGeniIcoubiId()->getGencIcoubiDescripcion()),'telefono'=>$xtel->getMiecTelTelefono(),'principal'=>$xtel->getMiebTelPrincipal(),'activo'=>$xtel->getMiebTelActivo());
                        }
                    }
                }
                $dirs = $this->getDoctrine()->getRepository('MRMApiBundle:MrmDirecciones')->findBy(array('mieiMie'=>$idMrm));
                if($dirs){
                    foreach($dirs as $xdir){
                        $arDirs[]=array('idMrm'=>$xdir->getMieiDirId(),'Ciudad'=>array('id'=>$xdir->getGeniCiu()->getGeniCiuId(),'descripcion'=>$xdir->getGeniCiu()->getGencCiuNombre()),'tipo'=>array('id'=>$xdir->getGeniIcoubiId()->getGeniIcoubiId(),'descripcion'=>$xdir->getGeniIcoubiId()->getGencIcoubiDescripcion()),'direccion'=>$xdir->getMiecDirDireccion(),'principal'=>$xdir->getMiebDirPrincipal(),'activo'=>$xdir->getMiebDirActivo());
                    }
                }
                $mails = $this->getDoctrine()->getRepository('MRMApiBundle:MrmEmails')->findBy(array('mieiMie'=>$idMrm));
                if($mails){
                    foreach($mails as $xmail){
                        $arMals[]=array('idMrm'=>$xmail->getMieiEmlsId(),'mail'=>$xmail->getMiecEmlsEmail(),'principal'=>$xmail->getMiebEmlsPrincipal(),'activo'=>$xmail->getMiebEmlsActivo());
                    }
                }
                
                $xMiembroData['telefonos']=$arTels;
                $xMiembroData['direcciones']=$arDirs;
                $xMiembroData['mails']=$arMals;
                $data['data'] = $xMiembroData;
                $jsonContent = $serializer->serialize($data, 'json');
                return new Response($jsonContent);
            }else{
               $data['mensaje']='Error No Existen Registros';
               //$data['data']='';
               $jsonContent = $serializer->serialize($data, 'json');
               return new Response($jsonContent);
            }
        }else{ # la peticion no tiene Token
            $data['mensaje']='Error Token';
            $jsonContent = $serializer->serialize($data, 'json');
            return new Response($jsonContent);
        }
        
    }
    */
    
    
    
}
