<?php

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
   
        <title>Aprendible</title>
        <link rel="stylesheet" type="text/css" href="/vanessaapp/public/assets/css/bootstrap4/bootstrap.css">

</body>
</html>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #cfcfcf;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 20%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
    </head> 
    <body>
 <!-- Trigger/Open The Modal -->
 <button id="myBtn">Open Modal </button> 

 

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <th align="right"><font face=impact>Dear Customer </font></th>
    <img src="/vanessaapp/public/assets/css/bootstrap4/customer.png" class="float-left" height="120px" width= "120px" type="text/css" href="/vanessaapp/public/assets/css/bootstrap4/customer.png">
    <table id="table-fields" class="table-fields">
                    </table> 
                    <tr>
                        <th align="right"><font face=tahoma>ID </font></th>
                        <td> <input type="text" id="id2" name="id2" value="" readonly="true"/> </td>
                    </tr>


                    <tr>
                        <th align="right"><font face=tahoma>Customer_name  </font></th>
                        <td> <input type="text" id="customer_name2" name="customer_name2" value="" readonly="true"/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Address</font></th>
                        <td> <input type="text" id="address2" name="address2" value="" readonly="true"/> </td>

                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Phone </font></th>
                        <td> <input type="text" id="phone2" name="phone2" value="" readonly="true"/> </td>
                    </tr>
                    
                    <tr>
                        <th align="right"><font face=tahoma>Pending debt </font></th>
                        <td> <input type="text" id="pending_debt2" name="pending_debt2" value="" readonly="true"/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Itbis </font></th>
                        <td> <input type="text" id="itbis2" name="itbis2" value="" readonly="true"/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Total </font></th>
                        <td> <input type="text" id="total2" name="total2" value="" readonly="true"/> </td>
                    </tr>
                    
                </table> 
                <label for="cust"><th align="right"><font face=impact> Total to transfer: </font><input type="text" id= "transfer" name= "transfer" value=""/> </label>
              
<label for="cust"><th align="right"><font face=impact>Choose a Customer:</font></th></label>

<select name="customers" id="customers">

</select>
<button id="btn-transfer"type="button" class="btn btn-dark btn-sm">TRANSFER</button>
  </div>
 
<h2 id="result"></h2>



</div> 

<script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
    <img src= "/vanessaapp/public/assets/css/bootstrap4/hytech.png" class="float-left" height="100px" width= "370px" type="text/css" href="/vanessaapp/public/assets/css/bootstrap4/hytech.png">
       <div class="container mt-1">
    @include('partials.nav')
       <form id="myform">
       @csrf
            <div class="form-group">
            <table>
                    <tr>
                        <th align="right"><font face=tahoma>ID </font></th>
                        <td> <input type="text" id="id" name="id" value=""/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Customer_name  </font></th>
                        <td> <input type="text" id="customer_name" name="customer_name" value=""/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Address</font></th>
                        <td> <input type="text" id="address" name="address" value=""/> </td>

                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Phone </font></th>
                        <td> <input type="text" id="phone" name="phone" value=""/> </td>
                    </tr>
                    
                    <tr>
                        <th align="right"><font face=tahoma>Pending debt </font></th>
                        <td> <input type="text" id="pending_debt" name="pending_debt" value=""/> </td>
                    </tr>

                    <tr>
                        <th align="right"><font face=tahoma>Itbis </font></th>
                        <td> <input type="text" id="itbis" name="itbis" value=""/> </td>
                    </tr>
            </table> 

            
                </form>
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
        <script src="/vanessaapp/public/assets/js/sweetalert2.all.min.js"></script>
    <script>

        $(document).ready(function(){

            loadGrid2();

            //funcion boton all
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


            $("#btn-transfer").on("click", function(e){
               
                var formData = new FormData();
                var data = $("#myform").serializeArray();
                var id = $("#id2").val();
                var transfer = $("#transfer").val();
                var pending_debt = $("#pending_debt2").val();
                var datajson = {};
                let selectCustomers = document.getElementById('customers');
                var idcust2 = selectCustomers.value;
               // console.log(Array.from(data));


               transfer = parseFloat (transfer);
               pending_debt = parseFloat (pending_debt);
               id = parseInt (id);
               id2 = parseInt (id2);
               var total = (pending_debt+transfer);
               console.log( total);

                
                formData.append("id" , id);
                formData.append("transfer", transfer);
                formData.append("pending_debt", pending_debt);
                formData.append("id2", idcust2);
                console.log();
              

                if (id == ""){ 
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'The customer was not found!'
                    });
                }

                else{
                    $.ajax({
                    url  : "/vanessaapp/public/api/transfer",
                    type : "POST",
                    dataType : "json",
                    data : formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    global: false,
                    success : function(res)
                    {
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your customer has been updated',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        //alert("SAVE SUCCESSFUL");
                        //location.reload();
                        loadGrid2();
                        
                    },
                    
                });
                }
             
            });

                

            //funcion load del grid
            $(document).on("click", ".btn-table-search", function(e){
                // var table = $(this).closest("table");
                var id = $(this).closest("tr").find("td:first").text();
                console.log(id);
                $.ajax({
                    url  : "/vanessaapp/public/api/dashboard/"+id,
                    type : "GET",
                    dataType : "json",
                    cache: false,
                    global: false,
                    success :  function(res)
                    {
                        
                        $.each(res, function(index, value){
                            $("#"+index).val(value);
                            console.log(index+"  "+value);
                            // $("#id").val("");
                            // $("#customer_name").val("");
                            // $("#id").val("");

                        });
                        

                        if (res.length == 0) 
                            {
                                Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'The customer was not found!'
                                });
                            }

                    }
                });
            });

            
            $("#btn-clear").on("click", function(e){
                 $("#id").val("");
                 $("#customer_name").val("");
                 $("#address").val("");
                 $("#phone").val("");
                 $("#pending_debt").val("");
                 $("#itbis").val("");
                 $("#search").val("");
            });

            $("#btn-save").on("click", function(e){

                var formData = new FormData();
                var data = $("#myform").serializeArray();
                var id = $("#id").val();
                var itbis = $("#itbis").val();
                var pending_debt = $("#pending_debt").val();
                
                //parseFloat(); se usa para decimales
                //parseInt(); se usa para numeros enteros;

                itbis = parseFloat(itbis);
                pending_debt = parseFloat(pending_debt);
                var itb = (pending_debt*itbis/100);
                var addition = (pending_debt + itb);
                console.log(addition);

                $.each(data, function(i, v){
                    var name = v.name;
                    var value = v.value;


                    formData.append(name, value);

                });


                formData.append("total" , addition);

                $.ajax({
                    url  : "/vanessaapp/public/api/dashboard",
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
                    title: 'Your customer has been saved',
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
                    text: 'The customer was not found!'
                    });
                }

                else{
                    $.ajax({
                    url  : "/vanessaapp/public/api/dashboard/"+id,
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
                        title: 'Your customer has been updated',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        //alert("SAVE SUCCESSFUL");
                        //location.reload();
                        loadGrid2();
                        
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
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
                        url: "/vanessaapp/public/api/dashboard/" + id,
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


                };
            });
        });



        $(document).on("click", ".btn-table-delete", function(e) {
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
                        url: "/vanessaapp/public/api/dashboard/" + id,
                        type: "DELETE",
                        dataType: "json",
                        cache: false,
                        global: false,
                        success: function(res) {
                            console.log("data: "+res);
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
                                loadGrid2()

                            }

                        }
                    });


                }
            });
        });
           
            
                        
                    

        $(document).on("click", ".btn-table-manage", function(e){
                // var table = $(this).closest("table");
                var id2 = $(this).closest("tr").find("td:first").text();
                console.log(id2);
            
                $.ajax({
                    url  : "/vanessaapp/public/api/dashboard/"+id2,
                    type : "GET",
                    dataType : "json",
                    cache: false,
                    global: false,
                    success :  function(res)
                    
                    {
                        $.each(res, function(index, value){
                            $("#"+index+"2").val(value);
                            console.log(index+"  "+value);

                    });
                        
                        if (res.length == 0) 
                            {
                                Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'The customer was not found!'
                                });
                            }

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
                            url  : "/vanessaapp/public/api/customer-filter-all",
                            type : "POST",
                            dataType : "json",
                            data : formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            global: false,
                            success :  function(res)
                            {
                                var table = `<table id="data-table" border ="1" class="table-secondary table-striped" style='border-collapse: collapse'><tbody class="m-2"></tbody></</table>`;
                                var row = "";
                                var td = "";
                                var drop = "";
                                var id = "";
                                var rowTittle = `<tr>
                                                    <th>ID</th>             
                                                    <th>Customer name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Created at</th>
                                                    <th>Updated at</th>
                                                    <th>Status</th>
                                                    <th>Pending debt</th>
                                                    <th>Itbis</th>
                                                    <th>Total</th>
                                                    <th>Branch id</th>
                                                    <th>Load</th>
                                                    <th>Delete</th>
                                                    <th>Manage</th>
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

                             if(ix =="itbis"){
                                vx = vx+"%" ;
                             }
                             if(ix =="id"){
                                id = vx;
                             }
                             if(ix == "customer_name" ){
                                drop = `<option value=`+id+`>`+vx+`</option>`;
                                $("#customers").append(drop);
                                
                             }

                             
                             
                             if (ix == "pending_debt") {

                                if (vx <="100") {

                                    td = td + `<td style="color:#FF0000">`+vx+`</td>`;
                                } else {
                                    td = td + `<td style="color:#010302">`+vx+`</td>`;
                                }

                                } else 
                                {
                                    td = td + `<td>`+vx+`</td>`;

                                }

                                });
                                        
                                    td = td + `<td><button id="btn-table-search-`+i+`" class="btn-table-search btn btn-sm round btn-info" type="button">Load</button></td>`;
                                    td = td + `<td><button id="btn-table-delete-`+i+`" class="btn-table-delete btn btn-sm round btn-danger" type="button">Delete</button></td>`;
                                    td = td + `<td><button id="btn-table-manage-`+i+`" class="btn-table-manage btn btn-sm round btn-success" type="button">Manage</button></td>`;
                                    row = row + `<tr>`+td+`</tr>`;
                                    td = "";
                                });
                            
                                $("#data-table").append(row); // muestra el resultado de un campo al hacer la consulta
                                    if (res.length == 0) 
                                    {
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'The customer was not found!'
                                        });
                                    }
                            

                            }
                        });
                    
                        

                        
            
        }
        
    </script>
    </body>
</html>

                 
                

                