export class TableCampus extends HTMLElement {
    config = { //Inicializo la configuracion de comunicacion 
        headers:new Headers({
            "Content-Type": "application/json"
        }),
    };

    constructor(data,nombreTabla) {
      super();
      this.datos = data;
      this.nombreTabla = nombreTabla;
      this.tituloColumnas = Object.keys(data[0]);
    }
  
    connectedCallback() {
      this.render();
    }


    crearTabla(){
        let columnas ="";
        let filas = "";
        let tabla = [];
        this.tituloColumnas.forEach(element => {
            columnas += `<th scope="col">${element}</th>`
        });
        columnas += "<th scope='col'>Opciones</th>" 
        this.datos.forEach((elemento) =>{
            let valores = Object.values(elemento);
            let fila ="";
            valores.forEach(element=>{
                fila += `<td>
                <label>${element}</label>                
                </td>`
            });
            fila += `<td>
                <form id="${valores[0]}" class="fila">
                    <input type="submit" name="0" value="✏️">
                    <input type="submit" name="1" value="❌">           
                </form>
		    </td>`
            filas += `<tr>${fila}</tr>`;
        });

        tabla[0] = columnas;
        tabla[1] = filas;
        return tabla
    }

    async deleteItem(id) {
        const url = `http://localhost/PDOnew/uploads/${this.nombreTabla}`;
        this.config.method = "DELETE";
        this.config.body = JSON.stringify(id);
        await ( await fetch(url,this.config)).json();
    }

    async putItem(id) {
        const url = `http://localhost/PDOnew/uploads/${this.nombreTabla}`;
        this.config.method = "PUT";
        this.config.body = JSON.stringify(id);
        await ( await fetch(url,this.config)).json();
    }

    render(){
        let tabla = this.crearTabla();
        this.innerHTML=/* html*/`
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                ${tabla[0]}
                </tr>
            </thead>
            <tbody>
                ${tabla[1]}
            </tbody>
        </table>
      `;

      const filas = this.querySelectorAll('.fila');
    filas.forEach(fila => {
      fila.addEventListener('submit', async (event) => {
        const form = event.target;
        const id = form.id;
        const contenido = { id:id }
        if(event.submitter == 0){
            await this.deleteItem(contenido);
        }
        else{
            
        }


      });
    });
    }
}

customElements.define("table-campus", TableCampus);
  