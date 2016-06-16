var size,option;

$('document').ready( function () {
    
    size = $('.formulaire select')[0].length
    
    for (var i=1; i<= size ; i++) {
        option = $('.formulaire select option:nth-child('+i+')')
        option.css('background-image','url("/schematics/assets/img/avatar/abstract-'+i+'.png")')
    }
    
})