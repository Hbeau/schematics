$(document).ready(function (){

    
    $('.connexion-content').hide()
    $('.connexion').qtip({
        content: {
            text: $('.connexion-content').clone()
        },
        style: {
            classes: 'qtip-bootstrap qtip-green',
            tip:{
                corner: false
            }
        },
        position: {
            my: 'top center',
            at: 'bottom center'
        },
        show: {
            event: 'click'  
        },
        hide: 'unfocus'
    })

})