
$(document).ready(function(){
/* =========================== menu ==================================== */
    $( "#ten2" ).keyup(function() {
        var ten2 = $('#ten2').val();
        $('#ten').val(ten2);
    });
	$( "#mota2" ).keyup(function() {
        var mota2 = $('#mota2').val();
        $('#mota').val(mota2);
    });
	$( "#lienket2" ).keyup(function() {
        var lienket2 = $('#lienket2').val();
        $('#lienket').val(lienket2);
    });
});