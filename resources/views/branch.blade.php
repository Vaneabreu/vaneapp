<?php

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aprendible</title>
    <link rel="stylesheet" type="text/css" href="/vanessaapp/public/assets/css/bootstrap4/bootstrap.css">

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<
    
>
<img src= "/vanessaapp/public/assets/css/bootstrap4/hytech.png" class="float-left" height="100px" width= "px" type="text/css" href="/vanessaapp/public/assets/css/bootstrap4/hytech.png">
    <div class="container mt-1">
@include('partials.nav')
    <form id="myform">
        <table>
            <tr>
                <th align="right"><font face=tahoma>ID</font></th>
                <td> <input type="text" id="id" name="id" value="" /> </td>
            </tr>

            <tr>
                <th align="right"><font face=tahoma>Branch_name </font></th>
                <td> <input type="text" id="branch_name" name="branch_name" value="" /> </td>

            </tr>

            <tr>
                <th align="right"><font face=tahoma>Address </font></th>
                <td> <input type="text" id="address" name="address" value="" /> </td>

            </tr>

            <tr>
                <th align="right"><font face=tahoma>Coordinate_x </font></th>
                <td> <input type="text" id="coordinate_x" name="coordinate_x" value="" /> </td>
            </tr>

            <tr>
                <th align="right"><font face=tahoma> Coordinate_y  </font></th>
                <td> <input type="text" id="coordinate_y" name="coordinate_y" value="" /> </td>
            </tr>
        </table>
    </form>
    <br />
    <br />
    <font face=impact> Search    </font> <input <input type="text" id="search" class="btn btn-outline-success" name="search" value="" onkeyup = "" />
    <br />
    <br />
    <button id="btn-save" type="button"class="btn btn-sm round btn-success">SAVE</button>
    <button id="btn-delete" type="button"class="btn btn-sm round btn-danger">DELETE</button>
    <button id="btn-update" type="button"class="btn btn-sm round btn-primary">UPDATE</button>
    <button id="btn-searchall" type="button"class="btn btn-sm round btn-info">SEARCH ALL</button>
    <button id="btn-clear" type="button"class="btn btn-sm round btn-light">CLEAR</button>
    <br />
    <br />

    <div id="table-section"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="/vanessaapp/public/assets/js/sweetalert2.all.min.js"></script>
    <script>
    $(document).ready(function() {

        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table-body tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        loadGrid2();
            
        $("#btn-searchall").on("click", function(e) {
            var formData = new FormData();
            var data = $("#myform").serializeArray();

            $.each(data, function(i, v) {
                var name = v.name;
                var value = v.value;

                formData.append(name, value);
            });
            loadGrid2();
        });

        $(document).on("click", ".btn-table-search", function(e) {
            // var table = $(this).closest("table");
            var id = $(this).closest("tr").find("td:first").text();

            $.ajax({
                url: "/vanessaapp/public/api/branch/" + id,
                type: "GET",
                dataType: "json",
                cache: false,
                global: false,
                success: function(res) {
                    console.log(res.lenght);

                    $.each(res[0], function(i, v) {
                        $("#" + i).val(v);

                    });

                    if (res.length == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'The user was not found!'
                        });
                    }

                }
            });

        });

        $("#btn-clear").on("click", function(e) {
            $("#id").val("");
            $("#branch_name").val("");
            $("#address").val("");
            $("#coordinate_x").val("");
            $("#coordinate_y").val("");
        });

        $("#btn-save").on("click", function(e) {

            var formData = new FormData();
            var data = $("#myform").serializeArray();
            var id = $("#id").val();
            console.log("data "+data);
            console.log("id "+id);
            console.log(Array.from(data));

            $.each(data, function(i, v) {
                var name = v.name;
                var value = v.value;
                formData.append(name, value);
            });

            console.log(Array.from(formData));

            $.ajax({
                url: "/vanessaapp/public/api/branch",
                type: "POST",
                dataType: "json",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                global: false,
                success: function(res) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your user has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    //alert("SAVE SUCCESSFUL");
                    //location.reload();

                    loadGrid2();
                }
            });
        });

        $("#btn-update").on("click", function(e) {

            var formData = new FormData();
            var data = $("#myform").serializeArray();
            var id = $("#id").val();
            var datajson = {};
            // console.log(Array.from(data));

            $.each(data, function(i, v) {
                var name = v.name;
                var value = v.value;
                datajson[name] = value;

                formData.append(name, value);
            });
            //console.log(Array.from(formData));

            if (id == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'The user was not found!'
                });
            } else {
                $.ajax({
                    url: "/vanessaapp/public/api/branch/" + id,
                    type: "PUT",
                    dataType: "json",
                    data: datajson,
                    cache: false,
                    global: false,
                    success: function(res) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your user has been updated',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        //alert("SAVE SUCCESSFUL");
                        //location.reload();

                        loadGrid2();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }


                });
            }

        });

        $("#btn-delete").on("click", function(e) {

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
                        url: "/vanessaapp/public/api/branch/" + id,
                        type: "DELETE",
                        dataType: "json",
                        cache: false,
                        global: false,
                        success: function(res) {
                            console.log(res);
                            //location.reload();

                            if (res == 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'The user was not found!'
                                });
                            } else {
                                Swal.fire(
                                    'Deleted!',
                                    'Your user has been deleted.',
                                    'success'
                                )
                                loadGrid2();
                            }

                        }
                    });

                }
            });

        });

    
        $(document).on("click", ".btn-table-delete", function(e) {

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
                        url: "/vanessaapp/public/api/branch/" + id,
                        type: "DELETE",
                        dataType: "json",
                        cache: false,
                        global: false,
                        success: function(res) {
                            console.log(res);
                            //location.reload();

                            if (res == 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'The user was not found!'
                                });
                            } else {
                                Swal.fire(
                                    'Deleted!',
                                    'Your user has been deleted.',
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

    function loadGrid2() {

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
            url: "/vanessaapp/public/api/branches-filter-all",
            type: "POST",
            dataType: "json",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            global: false,
            success: function(res) {
                var table = `<table id="data-table" border ="1"  class="table-secondary table-striped" collapse'><tbody id="table-body" class="m-2"></tbody></</table>`;
                var row = "";
                var td = "";
                var class_text = 'class="text-primary"';
                var rowTittle = `<thead> <tr>
                                    <th>ID</th>             
                                    <th>Branch name</th>
                                    <th>Address</th>
                                    <th>Coordinate x</th>
                                    <th>Coordinate y</th>
                                    <th>Created at </th>
                                    <th>Updated at </th>
                                    <th>Load</th>
                                    <th>Delete</th>
                                </tr> </thead>`;
                var column = "";

                $("#table-section").empty(); //variable vacia
                $("#table-section").append(table); //Inserta un valor como ultimo elemento
                $("#data-table").append(rowTittle);
                $.each(res, function(i, v) {

                    $.each(v, function(ix, vx){

                        if(vx == null){
                                vx = "";
                             }
                                        
                    if (ix == "coordinate_x"){
                  
                        if (vx > "50.30" ){
            
                        td = td + `<td style="color:#8A0064">`+vx+`</td>`;
                        }
                        else {
                        td = td + `<td style="color:#0A0809">`+vx+`</td>`;
                        }
                    }
                    else
                    {
                    td = td + `<td>`+vx+`</td>`;
                    } 
                                                    
                });
                    td = td + `<td><button id="btn-table-search-` + i + `" class="btn-table-search btn btn-sm round btn-info" type="button">Load</button></td>`
                    td = td + `<td><button id="btn-table-delete-` + i +`" class="btn-table-delete btn btn-sm round btn-danger" type="button">Delete</button></td>`
                    row = row + `<tr>` + td + `</tr>`;
                    td = "";
                });

                $("#data-table").append(row); // muestra el resultado de un campo al hacer la consulta
                // if (res.length == 0) 
                // {
                //     Swal.fire({
                //     icon: 'error',
                //     title: 'Oops...',
                //     text: 'The user was not found!'
                //     });
                // }
            }
        });
    }

</script>
</body>

</html>