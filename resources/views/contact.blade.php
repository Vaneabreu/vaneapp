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
    <body>
    <img src= "/vanessaapp/public/assets/css/bootstrap4/hytech.png" class="float-left" height="100px" width= "370px" type="text/css" href="/vanessaapp/public/assets/css/bootstrap4/hytech.png">
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
                        <th align="right"><font face=tahoma>Contact_name </font></th>
                        <td> <input type="text" id="contact_name" name="contact_name" value=""/> </td>
                        
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Phone </font></th>
                        <td> <input type="text" id="phone" name="phone" value=""/> </td>

                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Address </font></th>
                        <td> <input type="text" id="address" name="address" value=""/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Borrowed amount </font></th>
                        <td> <input type="text" id="borrowed_amount" name="borrowed_amount" value=""/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Amount paid</font></th>
                        <td> <input type="text" id="amount_paid" name="amount_paid" value=""/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Must</font></th>
                        <td> <input type="text" id="must" name="must" value=""/> </td>
                    </tr>

                    


                </table> 
            
            </form>
                <br />
                <br />
                <font face=impact> Search    </font> <input <input type="text" id="search" class="btn btn-outline-success" name="search" value="" onkeyup="loadGrid2();" />
                <br />
                <br/>
                <button id="btn-save" type="button"class="btn btn-sm round btn-success" >SAVE</button>
                <button id="btn-delete" type="button" class="btn btn-sm round btn-danger">DELETE</button>
                <button id="btn-update"type="button" class="btn btn-sm round btn-primary">UPDATE</button>
                <button id="btn-searchall"type="button" class="btn btn-sm round btn-info">SEARCH ALL</button>
                <button id="btn-clear"type="button" class="btn btn-sm round btn-light">CLEAR</button>
                <br/>
                <br/>

                <div id="table-section"></div>
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="/vanessaapp/public/assets/js/sweetalert2.all.min.js"></script>
    <script>

        $(document).ready(function(){

            loadGrid2();
           
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
                url  : "/vanessaapp/public/api/contact/"+id,
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
                            text: 'The contact was not found!'
                            });
                        }

                }
            });
                 
                });

                $("#btn-clear").on("click", function(e){
                 $("#id").val("");
                 $("#contact_name").val("");
                 $("#phone").val("");
                 $("#address").val("");
                 $("#borrowed_amount").val("");
                 $("#amount_paid").val("");
                 $("#must").val("");
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
                    url  : "/vanessaapp/public/api/contact",
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
                        title: 'Your contact has been saved',
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
                            timer: 3000
                        })
                    }
                });
            });

            $("#btn-update").on("click", function(e){

                var formData = new FormData();
                var data = $("#myform").serializeArray();
                var id = $("#id").val();
                var datajson = {};
               // console.log(Array.from(data));

                $.each(data, function(i, v){
                    var name = v.name;
                    var value = v.value;
                    datajson[name] = value;
                
                    formData.append(name, value);
                });
                //console.log(Array.from(formData));

                if (id == ""){ 
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'The contact was not found!'
                        });
                        }
                else{
                    $.ajax({
                    url  : "/vanessaapp/public/api/contact/"+id,
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
                        title: 'Your contact has been updated',
                        showConfirmButton: false,
                        timer: 1500
                        })

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
                            url  : "/vanessaapp/public/api/contact/"+id,
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
                                        text: 'The contact was not found!'
                                        });
                                    }
                                    else
                                    {
                                        Swal.fire(
                                        'Deleted!',
                                        'Your contact has been deleted.',
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
                            url  : "/vanessaapp/public/api/contact/"+id,
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
                                        text: 'The contact was not found!'
                                        });
                                    }
                                    else
                                    {
                                        Swal.fire(
                                        'Deleted!',
                                        'Your contact has been deleted.',
                                        'success'
                                        )
                                        loadGrid2();

                                    }
                            
                            }
                        });
                    }
                });
            }); 
            $("#btn-logout").on("click", function(e){

                $.ajax({
                    url  :  "/vanessaapp/public/web/logout",
                    type : "GET",
                    dataType : "json",
                    cache: false,
                    global: false,
                    success :  function(res)
                    {
                        //console.log(res);

                        $.each(res[0], function(i, v){
                            $("#"+i).val(v);
                        });
                    }
                });
            });
        });

        function loadGrid2(){

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
                url  : "/vanessaapp/public/api/contacts-filter-all",
                type : "POST",
                dataType : "json",
                data : formData,
                processData: false,
                contentType: false,
                cache: false,
                global: false,
                success :  function(res)
                {
                    console.log(res);
                    var table = `<table id="data-table" border ="1" class="table-secondary table-striped" style='border-collapse: collapse'><tbody class="m-2"></tbody></</table>`;
                    var row = "";
                    var td = "";
                    var rowTittle = `<tr>
                                        <th>ID</th>
                                        <th>Contact Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Borrowed amount</th>
                                        <th>Amount paid</th>
                                        <th>Must</th>
                                        <th>Updated at</th>
                                        <th>Created at</th>
                                        <th>Load</th>
                                        <th>Delete</th>
                                    </tr>`;
                    var column = "";

                    $("#table-section").empty();
                    $("#table-section").append(table);
                    $("#data-table").append(rowTittle);
                    $.each(res, function(i, v){
                        $.each(v, function(ix, vx){
                            if(vx == null){
                                vx = "";
                             }
                            td = td + `<td>`+vx+`</td>`;
                        });
                        td = td + `<td><button id="btn-table-search-`+i+`" class="btn-table-search btn btn-sm round btn-info" type="button">Load</button></td>`;
                        td = td + `<td><button id="btn-table-delete-`+i+`" class="btn-table-delete btn btn-sm round btn-danger" type="button">Delete</button></td>`;
                        row = row + `<tr>`+td+`</tr>`;
                        td = "";
                    });
                
                    $("#data-table").append(row);
                        // if (res.length == 0) 
                        // {
                        //     Swal.fire({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: 'The contact was not found!'
                        //     });
                        // }


                }
            });
        }
        
    </script>
    </body>
</html>

                 
                

                