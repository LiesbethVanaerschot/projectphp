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
    	
    	//$.get("student.php?dag=" + dag);

      // var dag = $("#dag").html();
      // dag niet uit een url halen maar gwn uit de array of veld
      // $("#next").on('click', function(){
      //     var dag = $("#dag").html();

      //     var request = $.ajax({
      //             url: "../ajax/sendingvar.php",
                  
      //             HIER MOET JE NAAR VOLGENDE LINKEN   url: "./ajax/sendingvar.php"      zodat uwe student.php het niet allemaal moet laden.

      //             In sendingvar.php, hierin moet je een query maken van uwen dag dat je hebt doorgestuurd.
      //             Het resultaat met je json_encode terugsturen naar student.php en daar moet je dan een loop nodig hebben om in tabel weertegeven (zoals api).
                  
      //             type: "POST",
      //             data: {'dag' : dag},
      //             dataType: "html"
      //       });
      //       request.done(function(msg){
      //         console.log("gestuurd!");
      //       })
      //     });
      // });

   		var request = $.ajax({
   			url: "./ajax/sendingvar.php",
        /*
        HIER MOET JE NAAR VOLGENDE LINKEN   url: "./ajax/sendingvar.php"      zodat uwe student.php het niet allemaal moet laden.

        In sendingvar.php, hierin moet je een query maken van uwen dag dat je hebt doorgestuurd.
        Het resultaat met je json_encode terugsturen naar student.php en daar moet je dan een loop nodig hebben om in tabel weertegeven (zoals api).
        */
   			type: "POST",
   			data: {'dag' : dag},
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