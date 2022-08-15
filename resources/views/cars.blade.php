<?php

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <head>
    <img src= "/vaneapp/public/assets/css/bootstrap4/hytech.png" class="float-left" height="100px" width= "370px" type="text/css" href="/vaneapp/public/assets/css/bootstrap4/hytech.png">
        <title>Aprendible</title>
        <link rel="stylesheet" type="text/css" href="/vaneapp/public/assets/css/bootstrap4/bootstrap.css">

        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head> 
    <body>
       <div class="container mt-1">
    @include('partials.nav')  
       <form id="myform">
            <div class="form-group">
            <table>
                    <tr>
                        <th align="right"><font face=tahoma>ID </font></th>
                        <td> <input type="text" id="id" name="id" value=""/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Car_name </font></th>
                        <td> <input type="text" id="car_name" name="car_name" value=""/> </td>
                        
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Model </font></th>
                        <td> <input type="text" id="model" name="model" value=""/> </td>

                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Mark </font></th>
                        <td> <input type="text" id="mark" name="mark" value=""/> </td>
                    </tr>

                     <tr>
                        <th align="right"><font face=tahoma>Year </font></th>
                        <td> <input type="text" id="year" name="year" value=""/> </td>
                    </tr>

                </table> 
                 
            
                <br />
                <br />
                <font face=impact> Search    </font> <input type="text" id="search"  class="btn btn-outline-success" name="search" value="" onkeyup="loadGrid2();" />
                <br />           
                <br/>
                <button id="btn-save" type="button" class="btn btn-sm round btn-success">SAVE</button> 
                <button id="btn-delete" type="button" class="btn btn-sm round btn-danger">DELETE</button>
                <button id="btn-update"type="button" class="btn btn-sm round btn-primary">UPDATE</button>
                <button id="btn-searchall"type="button" class="btn btn-sm round btn-info">SEARCH ALL</button>
                <button id="btn-clear"type="button" class="btn btn-sm round btn-light">CLEAR</button>
                <br/>
                <br/>

                <div id="table-section"></div>
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="/testlaravel/public/assets/js/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function(){

            loadGrid2();
            
            $("#elemento"); //BUSCAR POR EL ID DEL ELEMENTO
            $(".elemento"); //BUSCAR POR UNA CLASE DE UNO O VARIOS ELEMENTOS
            $("elemento"); //BUSCAR POR EL NAME DEL ELEMENTO

            $("#btn-searchall").on("click", function(e){
                var formData = new FormData();
                var data = $("#myform").serializeArray();
 
                $.each(data, function(i, v){
                    var name = v.name;
                    var value = v.value;

                    formData.append(name, value);
                });
                loadGrid2();
            });

            $(document).on("click", ".btn-table-search", function(e){
                   // var table = $(this).closest("table");
                    var id = $(this).closest("tr").find("td:first").text();

                    $.ajax({
                url  : "/vaneapp/public/api/cars/"+id,
                type : "GET",
                dataType : "json",
                cache: false,
                global: false,
                success :  function(res)
                {
                    

                    $.each(res, function(i, v){
                        $("#"+i).val(v);

                    });

                    if (res.length == 0) 
                        {
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'The car was not found!'
                            });
                        }

                }
            });
                 
                });

                $("#btn-clear").on("click", function(e){
                 $("#id").val("");
                 $("#car_name").val("");
                 $("#model").val("");
                 $("#mark").val("");
                 $("#year").val("");
                 $("#search").val("");
                });


            $("#btn-save").on("click", function(e){

                var formData = new FormData();
                var data = $("#myform").serializeArray();
                var id = $("#id").val();

                console.log(Array.from(data));

                $.each(data, function(i, v){
                    var name = v.name;
                    var value = v.value;

                    formData.append(name, value);
                });

                console.log(Array.from(formData));

                $.ajax({
                    url  : "/vaneapp/public/api/cars",
                    type : "POST",
                    dataType : "json",
                    data : formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    global: false,
                    success :  function(res)
                    {
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        //alert("SAVE SUCCESSFUL");
                        //location.reload();
                        loadGrid2();

                        
                    },
                    error: function(res)
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: Object.values(res.responseJSON.errors).join(' '),
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                });
            });

            $("#btn-update").on("click", function(e){

                var formData = new FormData();
                var data = $("#myform").serializeArray();
                var id = $("#id").val();
        
                var datajson = {};
               

                $.each(data, function(i, v){
                    var name = v.name;
                    var value = v.value;
                    datajson[name] = value;
                
                    formData.append(name, value);
                });
                //console.log(Array.from(formData));
                
                    if (id == ""){  //Si el valor es vacio que de error
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'The car was not found!'
                        });
                    }
                    else
                    {

                        $.ajax({   
                            url  : "/vaneapp/public/api/cars/"+id,
                            type : "PUT",
                            dataType : "json",
                            data : datajson,
                            cache: false,
                            global: false,
                            success :  function(res)
                            {
                                
                                Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your work has been updated',
                                showConfirmButton: false,
                                timer: 1500
                                });
                            
                                loadGrid2();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }

                });

                }

            });
             $("#btn-delete").on("click", function(e){

                var formData = new FormData();
                var data = $("#myform").serializeArray();
                var id = $("#id").val();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'delete'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url  : "/vaneapp/public/api/cars/"+id,
                            type : "DELETE",
                            dataType : "json",
                            cache: false,
                            global: false,
                            success :  function(res)
                            {
                                console.log(res);
                                //location.reload();

                                    if (res == 0){ 
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'The car was not found!'
                                        });
                                    }
                                    else
                                    {
                                        Swal.fire(
                                        'Deleted!',
                                        'Your record has been deleted.',
                                        'success'
                                        )
                                        loadGrid2();

                                    }
                            }
                        });
                    }
                });
            });

            $(document).on("click", ".btn-table-delete", function(e){ 
         // var table = $(this).closest("table");
             var id = $(this).closest("tr").find("td:first").text();

             Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'delete'
                    }).then((result) => {
                    if (result.isConfirmed) {


                        $.ajax({
                            url  : "/vaneapp/public/api/cars/"+id,
                            type : "DELETE",
                            dataType : "json",
                            cache: false,
                            global: false,
                            success :  function(res)
                            {
                                console.log(res);
                                //location.reload();

                                    if (res == 0){ 
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'The car was not found!'
                                        });
                                    }
                                    else
                                    {
                                        Swal.fire(
                                        'Deleted!',
                                        'Your record has been deleted.',
                                        'success'
                                        )
                                        loadGrid2();

                                    }
                            
                            }
                        });

                       
                    }
                });
            });     
            
        });

         
        function loadGrid2()//Funcion para la tabla 
        {
            var formData = new FormData();
            var data = $("#myform").serializeArray();

             $.each(data, function(i, v) {
            var name = v.name;
            var value = v.value;

            if (name != "search") {
                formData.append(name, $("#search").val());
            }

            });
            $.ajax({
                            url  : "/vaneapp/public/api/cars-filter-all",
                            type : "POST",
                            dataType : "json",
                            data : formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            global: false,
                            success : function(res)
                            {   
                                console.log(res);
                                var table = `<table id="data-table" border ="1" class="table-secondary table-striped" style='border-collapse: collapse'><tbody class="m-2"></tbody></</table>`;
                                var row = "";
                                var td = "";
                                var rowTittle = `<tr>
                                                    <th>ID</th>             
                                                    <th>Car name</th>
                                                    <th>Model</th>
                                                    <th>Mark</th>
                                                    <th>Year</th>
                                                    <th>Updated at</th>
                                                    <th>Created at</th>
                                                    <th>Customer ID</th>
                                                    <th>User ID</th>
                                                    <th>Status</th>
                                                    <th>Customer Name</th>
                                                    <th>User Name</th>
                                                    <th>Load</th>
                                                    <th>Delete</th>
                                                </tr>`;
                                var column = "";

                                $("#table-section").empty(); //variable vacia
                                $("#table-section").append(table); //Inserta un valor como ultimo elemento
                                $("#data-table").append(rowTittle);
                                $.each(res, function(i, v){
                                    $.each(v, function(ix, vx){
                                        
                                        if(vx == null){
                                         vx = "";
                                       }
                                        
                                        if (ix == "year"){
                  
                                            if (vx == "2022" ){
            
                                                td = td + `<td style="color:#CA30C1">`+vx+`</td>`;
                                            }
                                            else {
                                                td = td + `<td style="color:#040203">`+vx+`</td>`;
                                            }
                                        }
                                        else
                                        {
                                        td = td + `<td>`+vx+`</td>`;
                                        }
                                                    
                                    });
                                    td = td + `<td><button id="btn-table-search-`+i+`" class="btn-table-search btn btn-sm round btn-info" type="button">Load</button></td>`;
                                    td = td + `<td><button id="btn-table-delete-`+i+`" class="btn-table-delete btn btn-sm round btn-danger" type="button">Delete</button></td>`;
                                    row = row + `<tr>`+td+`</tr>`; //nombre del boton
                                    td = "";
                                });
                            
                                $("#data-table").append(row); // muestra el resultado de un campo al hacer la consulta
                                    if (res.length == 0) 
                                    {
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'The car was not found!'
                                        });
                                    }


                            }
                        });

            
        }

        
    </script>
    </body>
</html>

                 
                

                