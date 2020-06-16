<template>
    <div class="container container-task">
        <div class="row justify-content-md-center">
            <div class="col-sm-12">
                <h1>Lista de clinicas</h1>
                <button @click="showForm()" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Añadir</button>
                <br /><br />
                <table class="table table-striped"><!--Creamos una tabla que mostrará todas las clinicas-->
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Contenido</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Modificado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="task in arrayTasks" :key="task.id"> <!--Recorremos el array y cargamos nuestra tabla-->
                            <td v-text="task.id"></td>
                            <td v-text="task.nombre"></td>
                            <td v-text="task.descripcion"></td>
                            <td v-text="task.contenido"></td>
                            <td v-text="task.created_at"></td>
                            <td v-text="task.updated_at"></td>
                            <td>
                                <button class="btn btn-sm btn-primary" @click="loadFieldsUpdate(task)"><i class="fa fa-edit"></i>&nbsp;Modificar</button>
                                <button class="btn btn-sm btn-danger" @click="deleteTask(task)"><i class="fa fa-edit"></i>&nbsp;Borrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="actions" class="col-sm-4" style="display: none;">
                <div class="form-group">
                    <label for="clinicas_nombre"><strong>Nombre:</strong></label>
                    <input v-model="nombre" id="clinicas_nombre" type="text" class="form-control">
                </div>
                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras clinicas-->
                    <label for="clinicas_descripcion"><strong>Descripción:</strong></label>
                    <input v-model="descripcion" id="clinicas_descripcion" type="text" class="form-control">
                </div>
                <div class="form-group"><!-- Formulario para la creación o modificación de nuestras clinicas-->
                    <label for="clinicas_contenido"><strong>Contenido:</strong></label>
                    <input v-model="contenido" id="clinicas_contenido" type="text" class="form-control">
                </div>
                <div class="container-buttons">
                    <button v-if="update == 0" @click="saveTasks()" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i>&nbsp;Añadir</button>
                    <button v-if="update != 0" @click="updateTasks()" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>&nbsp;Actualizar</button>
                    <button @click="clearFields()" class="btn btn-sm btn-light"><i class="fa fa-times"></i>&nbsp;Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                descripcion:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                contenido:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                update:0, /*Esta variable contrarolará cuando es una nueva clinica o una modificación, si es 0 significará que no hemos seleccionado
                ninguna clinica, pero si es diferente de 0 entonces tendrá el id de la clinica y no mostrará el boton guardar sino el modificar*/
                arrayTasks:[], //Este array contendrá las clinicas de nuestra bd
            }
        },
        methods:{
            showForm(){/* abre el formulario */
                this.clearFields();
                $('#actions').show();
            },
            getTasks(){
                let me =this;
                let url = '/creandophp/curso11/curso11laravel/public/clinicas' //Ruta que hemos creado para que nos devuelva todas las clinicas
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayTasks = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            saveTasks(){
                let me =this;
                let url = '/creandophp/curso11/curso11laravel/public/clinicas' //Ruta que hemos creado para enviar una clinica y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la clinica
                    'nombre'     : this.nombre,
                    'descripcion': this.descripcion,
                    'contenido'  : this.contenido,
                }).then(function (response) {
                    me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });

            },
            updateTasks(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                clinica que queremos modificar*/
                let me = this;
                axios.put('/creandophp/curso11/curso11laravel/public/clinicas/' + this.update,{
                    'id'         : this.update,
                    'nombre'     : this.nombre,
                    'descripcion': this.descripcion,
                    'contenido'  : this.contenido,
                }).then(function (response) {
                   me.getTasks();//llamamos al metodo getTask(); para que refresque nuestro array y muestro los nuevos datos
                   me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
               })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la clinica que queremos modificar
                this.update = data.id
                let me =this;
                $('#actions').show();
                let url = '/creandophp/curso11/curso11laravel/public/clinicas/' + this.update;
                axios.get(url).then(function (response) {
                    me.nombre      = response.data.nombre;
                    me.descripcion = response.data.descripcion;
                    me.contenido   = response.data.contenido;
                    //me.showForm();
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            deleteTask(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la clinica que hemos elegido
                let me =this;
                let task_id = data.id
                if (confirm('¿Seguro que deseas borrar esta clinica?')) {
                    axios
                    .delete('/creandophp/curso11/curso11laravel/public/clinicas/' + task_id)
                    .then(function (response) {
                        me.getTasks();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }
                    );
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0 y cierra el formulario*/
                let me = this;
                $('#actions').hide();
                me.nombre      = "";
                me.descripcion = "";
                me.contenido   = "";
                me.update      = 0;
            }
        },
        mounted() {
           this.getTasks();
       }
    }
</script>
