$(document).ready(function (){

    
    $('.round-content').hide()
    $('.round').qtip({
        content: {
            text: $('.round-content').clone()
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