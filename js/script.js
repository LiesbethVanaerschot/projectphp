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
      
      reset();

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

            switch(value.lesBegin){
              case '08:30':
                  $('.l1').html(value.lesNaam);
                break;
              case '09:30':
                $('.l2').html(value.lesNaam);
                break; 
              case '10:45':
                $('.l4').html(value.lesNaam);
                break;
              case '11:45':
                $('.l5').html(value.lesNaam);
                break;
              case '13:45':
                $('.l7').html(value.lesNaam);
                break; 
              case '14:45':
                $('.l8').html(value.lesNaam);
                break;
              case '16:00':
                $('.l10').html(value.lesNaam);
                break; 
              case '17:00':
                $('.l11').html(value.lesNaam);
                break;            
            }

            switch(value.lesEind){
              case '09:30':
                  $('.l1').html(value.lesNaam);
                break;
              case '10:30':
                $('.l2').html(value.lesNaam);
                break; 
              case '11:45':
                $('.l4').html(value.lesNaam);
                break;
              case '12:45':
                $('.l5').html(value.lesNaam);
                break;
              case '14:45':
                $('.l7').html(value.lesNaam);
                break; 
              case '15:45':
                $('.l8').html(value.lesNaam);
                break;
              case '17:00':
                $('.l10').html(value.lesNaam);
                break; 
              case '18:00':
                $('.l11').html(value.lesNaam);
                break;            
            }
               console.log(begin);

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

    //reset functie uitschrijven
    var reset = function(){
        $('.lessenrooster .td-lesnaam').html(" ");
        $('.lessenrooster .td-lokaal').html(" ");
        $('.lessenrooster .td-docent').html(" ");
    }


});