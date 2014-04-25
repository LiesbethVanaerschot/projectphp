$(document).ready(function(){
	//on click
    $(".dag").click(function(){
        var weekdag = $(this).text();
        //meegeven aan pagina
        window.location.href = "weekdag.php?dag=" + weekdag;

        /* WEEKDAG.PHP BESTAAT NIET MEER, DEZE PAGINA WAS OVERB*/
    });

    var dagArray = ["maandag","dinsdag","woensdag","donderdag","vrijdag"];
    console.log(dagArray);
    $("#dag").text(dagArray[0]);

    var i = 0;
    console.log(dagArray[i]);

    $("#next").on("click",function(){
    	i = (i + 1) % dagArray.length;
    	$("#dag").text(dagArray[i]);

    	var dag = $("#dag").html();
    	console.log(dag);
    	
    

   		var request = $.ajax({
   			url: "./ajax/sendingvar.php",
        
   			type: "POST",
   			data: {dag : dag},
   			dataType: "html"
   		});
   		request.done(function(msg){
   			console.log("gestuurd!");
        console.log(msg);
   		})
    });
    
    $("#prev").on("click",function(){
    	if(i>0)
    	{
    		i = (i-1);
    		$("#dag").text(dagArray[i]);

    		var dag = $("#dag").html();
   			console.log(dag);

    		
    	}
    });


});