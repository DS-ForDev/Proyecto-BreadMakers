document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
  
      const agregarModal  = new bootstrap.Modal(document.getElementById("agregarModal"));
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
  
        themeSystem: 'bootstrap5',
  
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        locale:'es',
        //initialDate: '2023-01-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },
        eventClick: function(arg) {
          if (confirm('Are you sure you want to delete this event?')) {
            arg.event.remove()
          }
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: 'listar_evento.php',
  
        eventClick: function(info){
          
        const visualizarModal  = new bootstrap.Modal(document.getElementById("visualizarModal"));
  
        document.getElementById("visualizar_id").innerText = info.event.id;
        document.getElementById("visualizar_title").innerText = info.event.title;
        document.getElementById("visualizar_start").innerText = info.event.start.toLocaleString();
        document.getElementById("visualizar_end").innerText = info.event.end !== null ? info.event.end.
        toLocaleString() : info.event.start.toLocaleString();
  
        document.getElementById("edit_id").value = info.event.id;
        document.getElementById("edit_title").value = info.event.title;
        document.getElementById("edit_start").value = converterData(info.event.start);
        document.getElementById("edit_end").value = info.event.end !== null ? converterData(info.event.end) : converterData(info.event.start);
  
  
        visualizarModal.show();
        },
        select : function(info){
  
          console.log(info);
  
          
  
          document.getElementById("cad_start").value = converterData(info.start);
          document.getElementById("cad_end").value = converterData(info.start);
  
          agregarModal.show();
  
        }
      });
  
      calendar.render();
  
      function converterData(data) {
        const dataObj = new Date(data);
        const ano = dataObj.getFullYear();
        const mes = String(dataObj.getMonth() + 1).padStart(2, '0');
        const dia = String(dataObj.getDate()).padStart(2, '0');
        const hora = String(dataObj.getHours()).padStart(2, '0');
        const minuto = String(dataObj.getMinutes()).padStart(2, '0');
        
        return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
      }
  
      const formCadEvento = document.getElementById("formCadEvento");
  
      const msg = document.getElementById("msg");
  
      const msgCadEvento =document.getElementById("msgCadEvento");
  
      const btnCadEvento = document.getElementById("btnCadEvento");
  
      if(formCadEvento){
  
        formCadEvento.addEventListener("submit", async (e) => {
  
          e.preventDefault();
  
          btnCadEvento.value = "Guardando...";
  
          const dadosForm = new FormData(formCadEvento);
  
          const dados = await fetch("agregar_evento.php",{
              method:"POST",
              body: dadosForm
          });
  
          const resposta = await dados.json();
          
          if(!resposta['status']){
  
            msgCadEvento.innerHTML = `<div class="alert alert-danger" role="alert">
            ${resposta['msg']}</div>`;
            
  
          }else{
            msg.innerHTML = `<div class="alert alert-success text-center" role="alert">${resposta['msg']}</div>`;
  
            msgCadEvento.innerHTML = "";
  
            formCadEvento.reset();
  
            const novoEvento = {
              id: resposta['id'],
              title: resposta['title'],
              color: resposta['color'],
              start: resposta['start'],
              end: resposta['end'],
            }
  
            calendar.addEvent(novoEvento);
  
            removerMsg();
  
            agregarModal.hide();
  
          }
  
          btnCadEvento.value = "Agregado";
  
        })
  
      }
  
      function removerMsg(){
        setTimeout(() => {
          document.getElementById('msg').innerHTML = "";
        }, 6000)
      }
  
  
    });

    const btnViewEditEvento = document.getElementById("btnViewEditEvento");

    if(btnViewEditEvento){

      btnViewEditEvento.addEventListener("click", () => {

        document.getElementById("visualizarEvento").style.display = "none" ;
        document.getElementById("visualizarModalLabel").style.display = "none" ;

        document.getElementById("editarEvento").style.display = "block" ;
        document.getElementById("editarModalLabel").style.display = "block" ;
      })

    }

    const btnViewEvento = document.getElementById("btnViewEvento");

    if(btnViewEvento){

      btnViewEvento.addEventListener("click", () => {

        document.getElementById("visualizarEvento").style.display = "block" ;
        document.getElementById("visualizarModalLabel").style.display = "block" ;

        document.getElementById("editarEvento").style.display = "none" ;
        document.getElementById("editarModalLabel").style.display = "none" ;
      })

    }