<?php
// src/SIGESRHI/ExpedienteBundle/Twig/FechaExtension.php
namespace SIGESRHI\ExpedienteBundle\Twig;

class FechaExtension extends \Twig_Extension
{
    
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('fecha', array($this, 'fechaFilter')),
        );
    }

    public function fechaFilter($fecha)
    {

    $dias= array("Domingo,","Lunes,","Martes,","Miercoles,","Jueves,","Viernes,","Sabado,");
    $meses= array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
    
    //$test = new \DateTime($fecha);
    //$test=$fecha;
    return strftime("%d de ".$meses[date('n',strtotime($fecha))-1]." de %Y",strtotime($fecha));

        
    }

    public function getName()
    {
        return 'fecha_extension';
    }
}