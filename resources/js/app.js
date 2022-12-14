import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2/dist/sweetalert2.js';

import 'sweetalert2/src/sweetalert2.scss';

window.Alpine = Alpine;

Alpine.start();


Swal.fire({
    title: '¿Eliminar vacante?',
    text: "Las vacantes eliminas no se pueden recuperar",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, ¡eliminar!',
    cancelButtonText: 'Cancelar',

    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    }
})
