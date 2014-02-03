<?php

namespace SIGESRHI\CapacitacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SIGESRHI\CapacitacionBundle\Entity\Plancapacitacion;
use SIGESRHI\CapacitacionBundle\Form\PlancapacitacionType;

/**
 * Plancapacitacion controller.
 *
 */
class PlancapacitacionController extends Controller
{
    /**
     * Lists all Plancapacitacion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CapacitacionBundle:Plancapacitacion')->findAll();

        return $this->render('CapacitacionBundle:Plancapacitacion:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Plancapacitacion entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity  = new Plancapacitacion();
        $form = $this->createForm(new PlancapacitacionType(), $entity);
        $form->bind($request);

        //Comprobar si ya hay un plan para el año seleccionado
        $cant_anyo = $em->getRepository('CapacitacionBundle:Plancapacitacion')->comprobarAnyo($entity->getAnoplan());

        if($cant_anyo > 0){
            $this->get('session')->getFlashBag()->add('errorcreate', 'Error. Ya existe un plan registrado para el año seleccionado!');
            
            return $this->render('CapacitacionBundle:Plancapacitacion:new.html.twig', array(
               'entity' => $entity,
               'form'   => $form->createView(),
           ));
        }
        /* ******** Fin comprobar año ********* */

        if ($form->isValid()) {
           
            $em->persist($entity);
            $em->flush();
        
            //Mandar a pantalla de capacitaciones - Controlador
            $this->get('session')->getFlashBag()->add('aviso', 'Datos registrados correctamente.');

            $response = $this->forward('CapacitacionBundle:Capacitacion:new', array(
                        'idplan'  => $entity->getId(),
                        ));
            return $response;
        }

        return $this->render('CapacitacionBundle:Plancapacitacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Plancapacitacion entity.
     *
     */
    public function newAction()
    {
        $entity = new Plancapacitacion();
        $form   = $this->createForm(new PlancapacitacionType(), $entity);

       // Incluimos camino de migas
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
        $breadcrumbs->addItem("Capacitaciones", $this->get("router")->generate("pantalla_modulo",array('id'=>3)));
        $breadcrumbs->addItem("Plan de capacitaciones", $this->get("router")->generate("pantalla_capacitaciones"));
        $breadcrumbs->addItem("Registrar plan","");
        
        return $this->render('CapacitacionBundle:Plancapacitacion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Plancapacitacion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CapacitacionBundle:Plancapacitacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plancapacitacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CapacitacionBundle:Plancapacitacion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Plancapacitacion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CapacitacionBundle:Plancapacitacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plancapacitacion entity.');
        }

        $editForm = $this->createForm(new PlancapacitacionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CapacitacionBundle:Plancapacitacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Plancapacitacion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CapacitacionBundle:Plancapacitacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Plancapacitacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PlancapacitacionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('plancapacitacion_edit', array('id' => $id)));
        }

        return $this->render('CapacitacionBundle:Plancapacitacion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Plancapacitacion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CapacitacionBundle:Plancapacitacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Plancapacitacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('plancapacitacion'));
    }

    /**
     * Creates a form to delete a Plancapacitacion entity by id.
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