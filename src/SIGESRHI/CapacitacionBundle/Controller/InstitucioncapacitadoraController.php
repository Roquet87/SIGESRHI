<?php

namespace SIGESRHI\CapacitacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SIGESRHI\CapacitacionBundle\Entity\Institucioncapacitadora;
use SIGESRHI\CapacitacionBundle\Form\InstitucioncapacitadoraType;

use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Grid;

/**
 * Institucioncapacitadora controller.
 *
 */
class InstitucioncapacitadoraController extends Controller
{
    /**
     * Lists all Institucioncapacitadora entities.
     *
     */
    public function consultarAction()
    {
        $source = new Entity('CapacitacionBundle:Institucioncapacitadora','grupo_institucion');
        
        $grid = $this->get('grid');
  
        
        $grid->setId('grid_institucion');
        $grid->setSource($source);             
        
        // Crear
        $rowAction1 = new RowAction('Consultar', 'institucion_show');
        $rowAction1->manipulateRender(
            function ($action, $row)
            {
                 $action->setRouteParameters(array('id','pag'=> 1));
                return $action;
            }
        );
        $grid->addRowAction($rowAction1);

        //$grid->setDefaultOrder('fechaexpediente', 'desc');
        $grid->setLimits(array(5 => '5', 10 => '10', 15 => '15'));
        
        // Incluimos camino de migas
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
        $breadcrumbs->addItem("Capacitaciones", $this->get("router")->generate("pantalla_modulo",array('id'=>3)));
        $breadcrumbs->addItem("Instituciones", $this->get("router")->generate("pantalla_instituciones"));
        $breadcrumbs->addItem("Consultar instituciones", "");

        return $grid->getGridResponse('CapacitacionBundle:Institucioncapacitadora:index.html.twig');
    }

    public function modificarAction()
    {
        $source = new Entity('CapacitacionBundle:Institucioncapacitadora','grupo_institucion');
        
        $grid = $this->get('grid');
  
        
        $grid->setId('grid_institucion');
        $grid->setSource($source);             
        
        // Crear
        $rowAction1 = new RowAction('Modificar', 'institucion_edit');
        $rowAction1->manipulateRender(
            function ($action, $row)
            {
                 $action->setRouteParameters(array('id','pag'=> 3));
                return $action;
            }
        );
        $grid->addRowAction($rowAction1);

        //$grid->setDefaultOrder('fechaexpediente', 'desc');
        $grid->setLimits(array(5 => '5', 10 => '10', 15 => '15'));
        
        // Incluimos camino de migas
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
        $breadcrumbs->addItem("Capacitaciones", $this->get("router")->generate("pantalla_modulo",array('id'=>3)));
        $breadcrumbs->addItem("Instituciones", $this->get("router")->generate("pantalla_instituciones"));
        $breadcrumbs->addItem("Modificar institución", "");

        return $grid->getGridResponse('CapacitacionBundle:Institucioncapacitadora:index.html.twig');
    }

    public function eliminarAction()
    {
        $source = new Entity('CapacitacionBundle:Institucioncapacitadora','grupo_institucion');
        
        $grid = $this->get('grid');
  
        
        $grid->setId('grid_institucion');
        $grid->setSource($source);             
        
        // Crear
        $rowAction1 = new RowAction('Eliminar', 'institucion_confelim');
        $rowAction1->manipulateRender(
            function ($action, $row)
            {
                 $action->setRouteParameters(array('id','pag'=> 4));
                return $action;
            }
        );
        $grid->addRowAction($rowAction1);

        //$grid->setDefaultOrder('fechaexpediente', 'desc');
        $grid->setLimits(array(5 => '5', 10 => '10', 15 => '15'));
        
        // Incluimos camino de migas
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
        $breadcrumbs->addItem("Capacitaciones", $this->get("router")->generate("pantalla_modulo",array('id'=>3)));
        $breadcrumbs->addItem("Instituciones", $this->get("router")->generate("pantalla_instituciones"));
        $breadcrumbs->addItem("Eliminar institución", "");

        return $grid->getGridResponse('CapacitacionBundle:Institucioncapacitadora:index.html.twig');
    }


    /**
     * Creates a new Institucioncapacitadora entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Institucioncapacitadora();
        $form = $this->createForm(new InstitucioncapacitadoraType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('aviso', 'Institución registrada correctamente.');

            return $this->redirect($this->generateUrl('institucion_show', array('id' => $entity->getId(),'pag'=>2)));
        }

        return $this->render('CapacitacionBundle:Institucioncapacitadora:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Institucioncapacitadora entity.
     *
     */
    public function newAction()
    {
        $entity = new Institucioncapacitadora();
        $form   = $this->createForm(new InstitucioncapacitadoraType(), $entity);

          // Incluimos camino de migas
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
        $breadcrumbs->addItem("Capacitaciones", $this->get("router")->generate("pantalla_modulo",array('id'=>3)));
        $breadcrumbs->addItem("Instituciones", $this->get("router")->generate("pantalla_instituciones"));
        $breadcrumbs->addItem("Registrar institución", $this->get("router")->generate("hello_page"));

        return $this->render('CapacitacionBundle:Institucioncapacitadora:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Institucioncapacitadora entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CapacitacionBundle:Institucioncapacitadora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institucioncapacitadora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();
        $pagina = $request->get('pag');

         // Incluimos camino de migas
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
        $breadcrumbs->addItem("Capacitaciones", $this->get("router")->generate("pantalla_modulo",array('id'=>3)));
        $breadcrumbs->addItem("Instituciones", $this->get("router")->generate("pantalla_instituciones"));

        if($pagina == 1){
           $breadcrumbs->addItem("Consultar institución", $this->get("router")->generate("institucion")); 
        }
        else{
           $breadcrumbs->addItem("Registrar institución", $this->get("router")->generate("institucion_new")); 
        }
        $breadcrumbs->addItem("Datos de registro", $this->get("router")->generate("institucion_new"));

        return $this->render('CapacitacionBundle:Institucioncapacitadora:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'pag'         => $pagina,        ));
    }

    /**
     * Displays a form to edit an existing Institucioncapacitadora entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();

        $entity = $em->getRepository('CapacitacionBundle:Institucioncapacitadora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institucioncapacitadora entity.');
        }

        $editForm = $this->createForm(new InstitucioncapacitadoraType(), $entity);
        $deleteForm = $this->createDeleteForm($id);


        // Incluimos camino de migas
        $pagina = $request->get('pag');
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
        $breadcrumbs->addItem("Capacitaciones", $this->get("router")->generate("pantalla_modulo",array('id'=>3)));
        $breadcrumbs->addItem("Instituciones", $this->get("router")->generate("pantalla_instituciones"));

        if($pagina == 1){
          $breadcrumbs->addItem("Consultar Institución", $this->get("router")->generate("institucion"));  
          $breadcrumbs->addItem("Datos de registro", $this->get("router")->generate("institucion_show",array('id'=>$id,'pag'=>$pagina)));
        }
        else if($pagina == 2){
          $breadcrumbs->addItem("Registrar institución", $this->get("router")->generate("institucion_new")); 
          $breadcrumbs->addItem("Datos de registro", $this->get("router")->generate("institucion_show",array('id'=>$id,'pag'=>$pagina)));
        }   
        else{
          $breadcrumbs->addItem("Modificar institucion", $this->get("router")->generate("institucion_modificar")); 
        }

        $breadcrumbs->addItem("Edición de datos", "");


        return $this->render('CapacitacionBundle:Institucioncapacitadora:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'pag'         => $request->get('pag'),
        ));
    }

    /**
     * Edits an existing Institucioncapacitadora entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CapacitacionBundle:Institucioncapacitadora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institucioncapacitadora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new InstitucioncapacitadoraType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

        
        $this->get('session')->getFlashBag()->add('edit', 'Registro modificado correctamente.');

        
        if($request->get('pag') == 3){
               return $this->redirect($this->generateUrl('institucion_edit', array('id' => $id,'pag'=>$request->get('pag')))); 
            }
            else{
               return $this->redirect($this->generateUrl('institucion_show', array('id' => $id,'pag'=>$request->get('pag'))));  
            }

        }

        return $this->render('CapacitacionBundle:Institucioncapacitadora:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'pag'         => $request->get('pag'),
        ));
    }


    public function confEliminarAction($id){

     $request = $this->getRequest();
     $em = $this->getDoctrine()->getManager();

     $entity = $em->getRepository('CapacitacionBundle:Institucioncapacitadora')->find($id);
     
     $deleteForm = $this->createDeleteForm($id);

     if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institucioncapacitadora entity.');
        }

     $numcapacitadores = count($entity->getIdcapacitador());
          
     //Incluimos camino de migas
     $breadcrumbs = $this->get("white_october_breadcrumbs");
     $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
     $breadcrumbs->addItem("Capacitaciones", $this->get("router")->generate("pantalla_modulo",array('id'=>3)));
     $breadcrumbs->addItem("Instituciones", $this->get("router")->generate("pantalla_facilitadores"));
     $breadcrumbs->addItem("Eliminar institucion", $this->get("router")->generate("institucion_eliminar"));
     $breadcrumbs->addItem("Eliminar registro", "");

    return $this->render('CapacitacionBundle:Institucioncapacitadora:delete.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'pag'         => $request->get('pag'),
            'numcapacitadores'=>$numcapacitadores,
        ));

    }

    /**
     * Deletes a Institucioncapacitadora entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CapacitacionBundle:Institucioncapacitadora')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Institucioncapacitadora entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        $this->get('session')->getFlashBag()->add('delete', 'Registro eliminado correctamente');
        
        $pagina = $request->get('pag');
        if($pagina == 1){//consultar
           return $this->redirect($this->generateUrl('institucion')); 
        }
        else if($pagina == 4){ //eliminar
           return $this->redirect($this->generateUrl('institucion_eliminar'));  
        }
        else{
           return $this->redirect($this->generateUrl('pantalla_instituciones'));  
        }
        
    }

    /**
     * Creates a form to delete a Institucioncapacitadora entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
