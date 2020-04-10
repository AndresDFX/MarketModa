
const apiproduct = new Vue({
    el: '#apiproduct',

    data: {

        //Informacion basica
        nombre: '',
        slug: '',
        div_mensajeslug: 'Slug no disponible',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        deshabilitar_boton: 1,
        cantidad:0,

        //Precio
        precioanterior: 0,
        precioactual: 0,
        descuento: 0,
        porcentajededescuento: 0,
        descuento_mensaje: '0'

    },

    computed: {


        generarSlug: function () {

            //Limpia las cadenas de acentos
            var chars = {
                "á": "a", "é": "e", "í": "i", "ó": "o", "ú": "u",
                "à": "a", "è": "e", "ì": "i", "ò": "o", "ù": "u", "ñ": "n",
                "Á": "A", "É": "E", "Í": "I", "Ó": "O", "Ú": "U",
                "À": "A", "È": "E", "Ì": "I", "Ò": "O", "Ù": "U", "Ñ": "N",
                " ": "-", "_": "-",
            }
            var expr = /[áàéèíìóòúùñ_ ]/g;
            this.slug = this.nombre.trim().replace(expr, function (e) { return chars[e] }).toLowerCase()
            return this.slug;
        },

        generarDescuento: function () {

            if (this.porcentajededescuento > 0 && this.porcentajededescuento < 100) {

                this.descuento = (this.precioanterior * this.porcentajededescuento) / 100;
                this.precioactual = this.precioanterior - this.descuento;
                this.descuento_mensaje = 'Hay un descuento de $ ' + this.descuento;
            }


            else if (this.porcentajededescuento > 100) {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El descuento no puede ser superior a 100',
                })

                this.porcentajededescuento = 100;
                this.descuento = (this.precioanterior * this.porcentajededescuento) / 100;
                this.precioactual = this.precioanterior - this.descuento;
                this.descuento_mensaje = '';
            }

            else if (this.porcentajededescuento < 0) {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El descuento no puede ser inferior a 0',
                })

                this.porcentajededescuento = 0;
                this.descuento = (this.precioanterior * this.porcentajededescuento) / 100;
                this.precioactual = this.precioanterior - this.descuento;
                this.descuento_mensaje = '';
            }

            else {

                this.precioactual = this.precioanterior;
                this.descuento_mensaje = '';
            }
            return this.descuento_mensaje;

        }

    },

    methods: {

        //Metodo que obtiene la productos con Axios
        getProduct() {

            //Si la producto es vacia no ejecuta la validacion a nivel de BD
            if (this.slug != '') {
                let url = '/api/product/' + this.slug;
                axios.get(url).then(response => {
                    this.div_mensajeslug = response.data;

                    //Si el slug no existe en la BD
                    if (this.div_mensajeslug == "Slug disponible") {
                        this.div_clase_slug = 'badge badge-success';
                        this.deshabilitar_boton = 0;

                    } else {//Si el slug existe en la BD
                        this.div_clase_slug = 'badge badge-danger';
                        this.deshabilitar_boton = 1;
                    }
                    this.div_aparecer = true;


                })
            }
        },

        //Metodo para controlar la cantidad de elementos de un producto
        controlarCantidad() {

            if (this.cantidad < 0) {
                this.cantidad = 0;
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'La cantidad no puede ser inferior a 0',
                })
            }

        }

    },


    mounted(){

        if (data.editar=='Si') {
            this.nombre = data.datos.nombre;
            this.precioanterior = data.datos.precioanterior;
            this.porcentajededescuento = data.datos.porcentajededescuento;
            this.deshabilitar_boton = 0;
        }
    }


});
