const formulario = document.getElementById('FormularioUsuario');
const Usuario = document.getElementById('Usuario');
const BtnEnviar = document.getElementById('BtnEnviar');
const Pais = document.getElementById('Pais')
const NombreUsuario = document.getElementById('NombreUsario')
const PaisSeleccionado = document.getElementById('PaisSeleccionado')
const Telefono = document.getElementById('Telefono')
const MostrarResultados = document.getElementById('UsuariosIngresados')


const ObtenerNombres = async (e) => {
    e.preventDefault();

    BtnEnviar.disabled = true;
    const Nombre = Usuario.value

    try {

        const consulta = await fetch(`https://api.github.com/users/${Nombre}`, {
            method: 'GET',
        })

        if (consulta.status == 200) {
            const datos = await consulta.json();

            NombreUsuario.value = `${datos.name}`


        }
    } catch (error) {

    }
    BtnEnviar.disabled = false;
}

const ObtenerPaises = async () => {
    try {
        const consulta = await fetch('https://restcountries.com/v3.1/all');

        if (consulta.status === 200) {
            const datos = await consulta.json();
            const fragment = document.createDocumentFragment();

            for (let index = 0; index < datos.length; index++) {
                const option = document.createElement('option');
                option.textContent = datos[index].name.common;
                option.value = datos[index].idd ? `${datos[index].idd.root}${datos[index].idd.suffixes}` : '';

                fragment.appendChild(option);
            }

            Pais.appendChild(fragment);

            Pais.addEventListener('change', () => {
                const SeleccionarPais = Pais.options[Pais.selectedIndex];
                Telefono.value = SeleccionarPais.value;
            });
        }
    } catch (error) {
        console.error('Error al obtener países:', error);
    }
};

const GuardarUsuarios = async (e) => {

    e.preventDefault();


    BtnEnviar.disabled = true;

    const formData = new FormData(formulario)
    formData.append('tipo', 1);

    const url = '/EX_FINAL/controller/index.php'

    const config = {
        method: 'POST',
        body: formData

    }

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        const { mensaje, codigo, detalle } = data

        if (codigo == 1 && respuesta.status == 200) {

            Swal.fire({
                title: '¡Éxito!',
                text: mensaje,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }

            });

            formulario.reset();
            ObtenerPaises();
            ObtenerUsuarios();

        } else {
            console.log(detalle);
        }


    } catch (error) {
        console.log(error);
    }
    BtnEnviar.disabled = false;
}

const ObtenerUsuarios = async () => {

    const url = '/EX_FINAL/controller/index.php'
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        MostrarResultados.tBodies[0].innerHTML = '';
        const fragment = document.createDocumentFragment();
        let contador = 1;

        if (respuesta.status == 200) {
            if (data.length > 0) {
                data.forEach(Usuario => {
                    const tr = document.createElement('tr');
                    const celda1 = document.createElement('td');
                    const celda2 = document.createElement('td');
                    const celda3 = document.createElement('td');
                    const celda4 = document.createElement('td');
                    const celda5 = document.createElement('td');
                    const celda6 = document.createElement('td');


                    celda1.innerText = contador;
                    celda2.innerText = Usuario.usuario;
                    celda3.innerText = Usuario.nombreusuario;
                    celda4.innerText = Usuario.pais;
                    celda5.innerText = Usuario.correo;
                    celda6.innerText = Usuario.telefono;

    

                    tr.appendChild(celda1);
                    tr.appendChild(celda2);
                    tr.appendChild(celda3);
                    tr.appendChild(celda4);
                    tr.appendChild(celda5);
                    tr.appendChild(celda6);

                    fragment.appendChild(tr);
                    contador++;
                });

            } else {
                const tr = document.createElement('tr');
                const td = document.createElement('td');
                td.innerText = 'No existen Usuario ';
                tr.classList.add('text-center');
                td.colSpan = 5;

                tr.appendChild(td);
                fragment.appendChild(tr);
            }
        }

        MostrarResultados.tBodies[0].appendChild(fragment);

    } catch (error) {
        console.log(error);
    }
}

Usuario.addEventListener('blur', ObtenerNombres);
ObtenerPaises();
ObtenerUsuarios();
formulario.addEventListener('click', GuardarUsuarios);
