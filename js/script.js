$(document).ready(function(){
	//on click
    $(".dag").click(function(){
        var weekdag = $(this).text();
        //meegeven aan pagina
        window.location.href = "weekdag.php?dag=" + weekdag;
    });
});