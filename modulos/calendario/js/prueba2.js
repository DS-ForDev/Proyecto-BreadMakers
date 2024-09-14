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

    