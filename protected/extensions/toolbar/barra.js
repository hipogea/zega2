/**
 * Created by grecia on 14/04/2015.
 */
jQuery(function(){
    $(".img-swap").hover(
        function(){this.src = this.src.replace("_off","_on");},
        function(){this.src = this.src.replace("_on","_off");
        });
});
