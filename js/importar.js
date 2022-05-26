'use strict'

// Variables
const formulario = document.querySelector('.clean-DB');
const body = document.querySelector('body');

// Eventos
formulario.addEventListener('submit', preguntarEliminar);

// Funciones
function preguntarEliminar(e) {

    e.preventDefault();

    const cortinaNegra = document.createElement('div');
    cortinaNegra.classList.add('cortina-negra');
    
    const mensajeError = document.createElement('div');
    mensajeError.innerHTML = `
    <h4>¿Esta seguro de que desea eliminar la base de datos?</h4>
    <div class="botones">
    <a class="cerrar">Cancelar</a>
    <a href="vistas/eliminar.php" class="delete">Si, Eliminar</a>
    </div>
    `;
    mensajeError.classList.add('mensaje-error-admin');

    cortinaNegra.appendChild(mensajeError);
    
    
    body.appendChild(cortinaNegra);

    
    
    const btnCancelar = document.querySelector('.cerrar');

    btnCancelar.addEventListener('click', () => {
        cortinaNegra.remove();
    });

}

function cerrarVentana() {
    
}

