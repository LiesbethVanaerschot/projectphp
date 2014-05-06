$(document).ready(function(){
    var dagArray = ["maandag","dinsdag","woensdag","donderdag","vrijdag"];
    console.log(dagArray);
    $("#dag").text(dagArray[0]);

    var i = 0;
    console.log(dagArray[i]);

//FUNCTIES
//reset functie uitschrijven
  var resetschedule = function(){
        $('.lessenrooster .td-lesnaam').html(" ");
        $('.lessenrooster .td-lokaal').html(" ");
        $('.lessenrooster .td-docent').html(" ");
    }
//getschedule functie
  var getschedule = function(){
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

                switch(value.lesBegin){
                  case '08:30':
                      $('.l1').html(value.lesNaam);
                      $('.lo1').html(value.lesLokaal);
                      $('.d1').html(value.docentNaam);
                    break;
                  case '09:30':
                    $('.l2').html(value.lesNaam);
                    $('.lo2').html(value.lesLokaal);
                    $('.d2').html(value.docentNaam);
                    break; 
                  case '10:45':
                    $('.l4').html(value.lesNaam);
                    $('.lo4').html(value.lesLokaal);
                    $('.d4').html(value.docentNaam);
                    break;
                  case '11:45':
                    $('.l5').html(value.lesNaam);
                    $('.lo5').html(value.lesLokaal);
                    $('.d5').html(value.docentNaam);
                    break;
                  case '13:45':
                    $('.l7').html(value.lesNaam);
                    $('.lo7').html(value.lesLokaal);
                    $('.d7').html(value.docentNaam);
                    break; 
                  case '14:45':
                    $('.l8').html(value.lesNaam);
                    $('.lo8').html(value.lesLokaal);
                    $('.d8').html(value.docentNaam);
                    break;
                  case '16:00':
                    $('.l10').html(value.lesNaam);
                    $('.lo10').html(value.lesLokaal);
                    $('.d10').html(value.docentNaam);
                    break; 
                  case '17:00':
                    $('.l11').html(value.lesNaam);
                    $('.lo11').html(value.lesLokaal);
                    $('.d11').html(value.docentNaam);
                    break;            
                }

                switch(value.lesEind){
                  case '09:30':
                      $('.l1').html(value.lesNaam);
                      $('.lo1').html(value.lesLokaal);
                      $('.d1').html(value.docentNaam);
                    break;
                  case '10:30':
                      $('.l2').html(value.lesNaam);
                      $('.lo2').html(value.lesLokaal);
                      $('.d2').html(value.docentNaam);
                    break; 
                  case '11:45':
                      $('.l4').html(value.lesNaam);
                      $('.lo4').html(value.lesLokaal);
                      $('.d4').html(value.docentNaam);
                    break;
                  case '12:45':
                      $('.l5').html(value.lesNaam);
                      $('.lo5').html(value.lesLokaal);
                      $('.d5').html(value.docentNaam);
                    break;
                  case '14:45':
                      $('.l7').html(value.lesNaam);
                      $('.lo7').html(value.lesLokaal);
                      $('.d7').html(value.docentNaam);
                    break; 
                  case '15:45':
                      $('.l8').html(value.lesNaam);
                      $('.lo8').html(value.lesLokaal);
                      $('.d8').html(value.docentNaam);
                    break;
                  case '17:00':
                      $('.l10').html(value.lesNaam);
                      $('.lo10').html(value.lesLokaal);
                      $('.d10').html(value.docentNaam);
                    break; 
                  case '18:00':
                      $('.l11').html(value.lesNaam);
                      $('.lo11').html(value.lesLokaal);
                      $('.d11').html(value.docentNaam);
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
          });
  }

//AUTOLOAD MAANDAG
  getschedule();

//NEXT KLIKKEN

    $("#next").on("click",function(e){
    	i = (i + 1) % dagArray.length;
    	$("#dag").text(dagArray[i]);
      
      resetschedule();

   		getschedule();

        e.preventDefault();
      });

//PREVIOUS KLIKKEN
    
    $("#prev").on("click",function(e){
    	if(i>0)
    	{
    		i = (i - 1) % dagArray.length;
    		$("#dag").text(dagArray[i]);
    	}
      else
      {
        i = 4
        $("#dag").text(dagArray[i]);
      }
      resetschedule();
      getschedule();

      
      e.preventDefault();
    });

//TAB HIDE EN SHOW FUNCTIES
  $(".active-tab-rooster a").on("click",function(){
      console.log("click rooster");
      ClickRooster();
  });

  $(".active-tab-meldingen a").on("click",function(){
      console.log("click meldingen");
      ClickMeldingen();
  });

  function ClickRooster () {
      $("#div-rooster").css("display", "block");
      $("#div-meldingen").css("display", "none");
      $(".active-tab-rooster").css("background-color", "#f24f11");
      $(".active-tab-meldingen").css("background-color", "#007d8a");
      }

  function ClickMeldingen () {
      $("#div-rooster").css("display", "none");
      $("#div-meldingen").css("display", "block");
      $(".active-tab-rooster").css("background-color", "#007d8a");
      $(".active-tab-meldingen").css("background-color", "#f24f11");
      }    
});