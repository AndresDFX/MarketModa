

const apicategory = new Vue({
    el: '#apicategory',

    data: {

        //Informacion basica
        nombre: '',
        slug: '',
        div_mensajeslug: 'Slug no disponible',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        deshabilitar_boton: 1



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
        }

    },

    methods: {

        //Metodo que obtiene la categorias
        getCategory() {

            //Si la categoria es vacia no ejecuta la validacion a nivel de BD
            if (this.slug != '') {
                let url = '/api/category/' + this.slug;
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



    },
    mounted() {

        if (document.getElementById('editar')) {
            this.nombre = document.getElementById('nombretemp').innerHTML;
            this.deshabilitar_boton = 0;
        }


    }



});
