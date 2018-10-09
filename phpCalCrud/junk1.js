  $(document).ready(function() {
  
    var calendar = $('#calendar').fullCalendar({
    defaultView: 'agendaWeek',   
    editable:false,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    allDaySlot: false,
    slotEventOverlap: true,
    slotDuration: "01:00:00",
    slotLabelInterval: "01:00:00",       
    minTime: "08:00:00",
    maxTime: "12:00:00",
    businessHours: [
    {
         // days of week. an array of zero-based day of week integers (0=Sunday)
        dow: [0, 1, 2, 3, 4, 5, 6], // Monday - Friday
        start: '08:00', // a start time
        end: '12:00', // an end time
    },
    {
        dow: [7],
        start: '08:00',
        end: '12:00'
    }
    ],     // Displays events on calendar         
    events: 'load.php',
    eventTextColor: '#ffffff',
    eventLimit: true,    
    selectable:false,
    selectHelper:true,  
    select: function(start, end)
    {
     var carrier = prompt("Enter carrier");
        if(!carrier) return false;
    // var notes = prompt("Enter notes");    
     if(carrier)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");          
      $.ajax({
       url:"insertT2.php",
       type:"POST",
       data:{carrier:carrier, start:start},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    }, 
   // Opens modal for admin to edit/update.
    eventClick:function(event) {
        
        console.log("here");
        $('#carrier').val(event.carrier);
        $('#phone').val(event.phone);
        $('#purchorder').val(event.purchorder);
        $('#email').val(event.email);
        $('#notes').val(event.notes);
        $('#id').val(event.id);
        
        $('#fullCalModal').modal('show');
        
        $('#submit').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault(); 
            console.log("submit");
            calendar.fullCalendar('eventUpdate');     
            $('#fullCalModal').modal('hide');
            
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var carrier = $('#carrier').val();  
            var phone = $('#phone').val(); 
            var purchorder = $('#purchorder').val();   
            var email = $('#email').val(); 
            var notes = $('#notes').val();   
            var id = $('#id').val();   
            
            $.ajax({
               url:"updatet3.php",
               type:"POST",
               data:{carrier:carrier, phone:phone, purchorder:purchorder, email:email, notes:notes, start:start, id:id},
               success:function()
               {
                alert("Event updated");
                calendar.fullCalendar('refetchEvents');   
               }
            });

            
       }); // Delete event
            $( '#deleteit' ).click(function() {
            console.log("deleteit");    
            $('#fullCalModal').modal('hide'); 
                
                if(confirm("Are you sure you want to remove it?"))
             {
              var id = event.id;
              $.ajax({
               url:"delete.php",
               type:"POST",
               data:{id:id},
               success:function()
               {
                calendar.fullCalendar('refetchEvents');
                alert("Event Removed");
               }   
              })
             }
           });       
        },
        // Modal elements
      eventRender: function(event, element) {
        console.log(event);
        element.find('.fc-time').append('<button type="button" id="deleteEventButton" class="close btn-delete" data-dismiss="modal" aria-label="Close"><span class="delete" aria-hidden="true">&#10006;</span></button>');
          element.find(".fc-title").append(" - " + event.carrier + " ");         
          element.find(".fc-title").append(" - " + event.phone + " ");          
          element.find(".fc-title").append(" - " + event.email + " ");
          element.find(".fc-title").append("<br/> " + " " + event.purchorder + " ");
          element.find(".fc-title").append("<br/> " + " " + event.notes + " ");
          element.find("#deleteEventButton").click(function() {
            $('#calendar').fullCalendar('removeEvents',event._id);   
         });
         if(event.email === "") {
                    element.css('background-color', '#378006');
                } else{
                    element.css('background-color', '#FF0000');
                }
        } 
   });
  
  });
   