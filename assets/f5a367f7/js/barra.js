/**
 * Created by grecia on 14/04/2015.
 */
jQuery(
function(){
    $(".img-swap").hover(
        function(){this.src = this.src.replace("_off","_on");},
        function(){this.src = this.src.replace("_on","_off");
        });
}
);

							 
							 
 $(document).ready(function() { 
    $('.boton_barrita').click(function() {
            //$(this).hide();
        $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#0a0',
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } }); 
 
        setTimeout($.unblockUI, 2000);
           /* $(this).css("display", "none");*/

    }

    );
});
