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
    	
      var student = $(".user").html();
      console.log(student);

   		var request = $.ajax({
   			url: "./ajax/sendingvar.php",
   			type: "POST",
   			data: {dag : dag, student : student},
   			dataType: "html"
   		});
   		request.done(function(msg){
   			console.log("gestuurd!");
        //var json = msg;
        var json = jQuery.parseJSON(msg);
        console.log(json);
        //iets met als json === "" alle text in tabel weg 
        // als json !== "" $.each en dan met switch case tabel invullen.
        if(json.length){
          $.each(json, function(index, value){
            console.log(index);
            console.log(value);
            var begin = $('.td-beginuur').html();
            var eind = $('.td-einduur').html();

               console.log(begin);
               if(begin == value.lesBegin || eind == value.lesEind){
                console.log('php');

                $('.lessenrooster .l1').html(value.lesNaam);
                $('.lessenrooster .l2').html(value.lesNaam);
                $('.lessenrooster .l4').html(value.lesNaam);
                $('.lessenrooster .l5').html(value.lesNaam);
                $('.lessenrooster .l7').html(value.lesNaam);
                $('.lessenrooster .l8').html(value.lesNaam);
                $('.lessenrooster .l10').html(value.lesNaam);
                $('.lessenrooster .l11').html(value.lesNaam);
                }
               });
              }  
        else
        {
          $('.lessenrooster .td-lesnaam').html(" ");
          $('.lessenrooster .td-lokaal').html(" ");
          $('.lessenrooster .td-docent').html(" ");
        }
         
          
          /*$.each(value, function(key, value){
            document.write(value);
          });*/
          
        });
      });
        //console.log(msg);
    
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