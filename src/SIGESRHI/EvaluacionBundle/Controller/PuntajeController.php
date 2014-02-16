<?php

namespace SIGESRHI\EvaluacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SIGESRHI\EvaluacionBundle\Entity\Puntaje;
use SIGESRHI\EvaluacionBundle\Form\PuntajeType;

use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Grid;
use APY\DataGridBundle\Grid\Column\TextColumn;

/**
 * Puntaje controller.
 *
 */
class PuntajeController extends Controller
{
    /**
     * Lists all Puntaje entities.
     *
     */
    public function indexAction()
    {
       $source = new Entity('EvaluacionBundle:Puntaje', 'grupo_puntaje');
        // Get a grid instance
        $grid = $this->get('grid');

        //camino de miga
    /*    $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Inicio", $this->get("router")->generate("hello_page"));
        $breadcrumbs->addItem("Evaluación de desempeño", $this->get("router")->generate("pantalla_modulo",array('id'=>4)));
        $breadcrumbs->addItem("Formularios de evaluación", $this->get("router")->generate("formularioevaluacion"));
      */  //fin camino de miga
       

        // Attach the source to the grid
        $grid->setId('grid_puntajes');
        $grid->setSource($source);

        $em = $this->getDoctrine()->getManager();
          
        $grid->setNoDataMessage("No se encontraron resultados");
        $grid->setDefaultOrder('id', 'asc');
        
        $rowAction1 = new RowAction('Consultar', 'puntaje_show');

        $rowAction1->setColumn('info_column');

        $grid->addRowAction($rowAction1);     
        //$grid->addExport(new ExcelExport('Exportar a Excel'));
        $grid->setLimits(array(5 => '5', 10 => '10', 15 => '15'));

    // Manage the grid redirection, exports and the response of the controller
    return $grid->getGridResponse('EvaluacionBundle:Puntaje:index.html.twig');
    }

    /**
     * Creates a new Puntaje entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Puntaje();
        $form = $this->createForm(new PuntajeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('puntaje_show', array('id' => $entity->getId())));
        }

        return $this->render('EvaluacionBundle:Puntaje:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Puntaje entity.
     *
     */
    public function newAction()
    {
        $entity = new Puntaje();
        $form   = $this->createForm(new PuntajeType(), $entity);

        return $this->render('EvaluacionBundle:Puntaje:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Puntaje entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EvaluacionBundle:Puntaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Puntaje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EvaluacionBundle:Puntaje:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Puntaje entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EvaluacionBundle:Puntaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Puntaje entity.');
        }

        $editForm = $this->createForm(new PuntajeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('EvaluacionBundle:Puntaje:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Puntaje entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EvaluacionBundle:Puntaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Puntaje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PuntajeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('puntaje_edit', array('id' => $id)));
        }

        return $this->render('EvaluacionBundle:Puntaje:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Puntaje entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('EvaluacionBundle:Puntaje')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Puntaje entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('puntaje'));
    }

    /**
     * Creates a form to delete a Puntaje entity by id.
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
