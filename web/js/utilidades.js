/* VALIDACIONES Y UTILIDADES : SIGESRHI */

$(document).ready(function(){

/***** Tooltip ******/
    var opcionestool = {
        placement: "right",  // Posicionado a la derecha
        delay: 200  // Tiempo de espera 200 milésimas de segundo
    };
    
    // Se seleccionan los elementos con clase tool
    $(".tool").tooltip(opcionestool);

/***** Validador *****/
     var opcionesVal = {lang:'es'};
              $('form').bValidator(opcionesVal);

/***** Calendario ****/

    $('.date').datepicker({ 
              dateFormat: 'dd-mm-yy',  
              changeMonth: true,
              changeYear: true,
              yearRange: "-100:+0",});
              
              jQuery(function($){
              $.datepicker.regional['es'] = {
              closeText: 'Cerrar',
              prevText: '&#x3c;Ant',
              nextText: 'Sig&#x3e;',
              currentText: 'Hoy',
              monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
              'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
              monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
              'Jul','Ago','Sep','Oct','Nov','Dic'],
              dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
              dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
              dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
              weekHeader: 'Sm',
              firstDay: 1,
              isRTL: false,
              showMonthAfterYear: false,
              yearSuffix: ''};
              $.datepicker.setDefaults($.datepicker.regional['es']);
              });

    $('.datenr').datepicker({ 
              dateFormat: 'dd-mm-yy',  
              changeMonth: true,
              changeYear: true,
              yearRange: "-100:+2",});

  /***** Validaciones de máscara ****/
    $(".telefono").mask("99999999",{placeholder:""});
    $(".isss").mask("999999999",{placeholder:""});
    $(".nup").mask("999999999999",{placeholder:""});
    $(".nip").mask("9999999",{placeholder:""});
    $(".dui").mask("999999999",{placeholder:""});
    $(".nit").mask("99999999999999",{placeholder:""});
    
    
/******** Validacion con MaskMoney ***************/
    $(".dinero").maskMoney({thousands:'', decimal:'.'});
  


  /**** Ayuda *******/
    var opcioneshelp = {
        show: false,  // Mostrar sólo por medio del boton
        keyboard: false  // Desactivar el evento ESC del teclado
    };
    $('#help').modal(opcioneshelp);

});


/** Funcion confirmar cancelar ***/
function cancelar() {

 var decision= confirm('Si cancela perder\xE1 los datos del formulario actual.\n\xbfEst\xE1 seguro de cancelar?');
    if(decision){
      window.history.back(1);
    }
}

/****** Funciones predefinidas Formularios embebidos ************/
function addTagForm(collectionHolder, $newLinkLi) {
    // Obtiene los datos del prototipo explicado anteriormente
    var prototype = collectionHolder.data('prototype');

    // Consigue el nuevo índice
    var index = collectionHolder.data('index');

    // Sustituye el '__name__' en el prototipo HTML para que
    // en su lugar sea un número basado en cuántos elementos hay
    var newForm = prototype.replace(/__name__/g, index);

    // Incrementa en uno el índice para el siguiente elemento
    collectionHolder.data('index', index + 1);

    // Muestra el formulario en la página en un elemento li,
    // antes del enlace 'Agregar una etiqueta'
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);

     // Añade un enlace eliminar el nuevo formulario
    addTagFormDeleteLink($newFormLi);
}

function addTagFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a href="#" style="padding-left: 40px;">Eliminar</a>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // evita crear el enlace con una "#" en la URL
        e.preventDefault();

        // quita el li de la etiqueta del formulario
        $tagFormLi.remove();
    });

/** Validaciones en embebidos */
//calendario

$(function() {
$('.date').datepicker({ 
              dateFormat: 'dd-mm-yy',  
              changeMonth: true,
              changeYear: true,
              yearRange: "-100:+0",});

$(".telefono").mask("99999999",{placeholder:" "});
$(".dinero").maskMoney({thousands:'', decimal:'.'});
});

//Spinner para los elementos de forms embebidos
$( ".spinner" ).spinner({
     spin: function( event, ui ) {
      if ( ui.value < 0 ) {
       $( this ).spinner( "value", 0 );
       return false;
      } 
     }
    });

}


/***** Menu seccion ******/

$(document).ready(function(){
  $("#accordian h3").click(function(){
    //slide up all the link lists
    $("#accordian ul ul").slideUp();
    //slide down the link list below the h3 clicked - only if its closed
    if(!$(this).next().is(":visible"))
    {
      $(this).next().slideDown();
    }
  })
});


  //agregar el widget "spinner" para los campos que tengan la clase "spinner"
   $(document).ready(function(){
    
    $( ".spinner" ).spinner({
     spin: function( event, ui ) {
      if ( ui.value < 0 ) {
       $( this ).spinner( "value", 0 );
       return false;
      } 
     }
    });
   });//ready

   $(document).ready(function(){
    
    $( ".spinner1" ).spinner({
     spin: function( event, ui ) {
      if ( ui.value < 1 ) {
       $( this ).spinner( "value", 1 );
       return false;
      } 
     }
    });
   });//ready

