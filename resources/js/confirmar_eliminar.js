
const confirmar_eliminar = new Vue({
    el: '#confirmar_eliminar',

    data: {
        URL_delete: '',


    },


    methods: {


        deseas_eliminar(id) {

            this.URL_delete = document.getElementById('url_base').innerHTML + '/' + id;

            //Llamamos el id del componente modal_eliminar.blade y lo mostramos
            $('#modalEliminar').modal('show');

        }
    },


});
