$(document).ready(function(){
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
<<<<<<< HEAD
   			url: "./ajax/sendingvar.php",
        
   			type: "POST",
=======
   			type: "POST",
        url: "./ajax/sendingvar.php",
        /*
        HIER MOET JE NAAR VOLGENDE LINKEN   url: "./ajax/sendingvar.php"      zodat uwe student.php het niet allemaal moet laden.

        In sendingvar.php, hierin moet je een query maken van uwen dag dat je hebt doorgestuurd.
        Het resultaat met je json_encode terugsturen naar student.php en daar moet je dan een loop nodig hebben om in tabel weertegeven (zoals api).
        */
>>>>>>> sarah
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