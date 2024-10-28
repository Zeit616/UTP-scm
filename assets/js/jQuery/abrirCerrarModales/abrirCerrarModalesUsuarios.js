$(document).ready(function(){
    //Abrir-Cerrar modal de añadir usuario
        $('#abrirModalAñadirUsuario').click(function() {
            $('#modalAñadirUsuario').modal('show');
        });
        $('#cerrarModalAñadirUsuario').click(function() {
            $('#modalAñadirUsuario').modal('hide');
        });
    //Abrir-Cerrar modal de editar usuario
        $("#tablaUsuarios").on("click", ".botonEditarUsuario",function(){
            //Abrir modal Editar item
                $("#modalEditarUsuario").modal("show");              
            //Llenar inputs al mostrar modal
                var tablaUsuarios = $("#tablaUsuarios").DataTable();
                if(tablaUsuarios.row(this).child.isShown()) {
                    var data = tablaUsuarios.row(this).data();                
                } else {                
                    var data = tablaUsuarios.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                };   
                $("#EditarIdUsuario").val(data[0]);
                $("#EditarNombreUsuario").val(data[1]);
                $("#EditarContraseña").val(data[3]);
                $("#EditarRolUsuario").val(data[4]);
                $("#EditarEstadoUsuario").val(data[5]);
        });
        $('#cerrarModalEditarUsuario').click(function() {
            $('#modalEditarUsuario').modal('hide');
        });
});