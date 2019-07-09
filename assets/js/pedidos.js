$.ajax({
    url: "Api/filtroProduto.php",
    type: 'POST',
    contentType: 'application/json',
    success: function(data) {
         var dataa = typeof data ==='string'? JSON.parse(data):data;
        
         var html = '';

         $.each(dataa, function( k, v ) {
            html +='<option value='+v.id_produto+'>'+ v.descricao_produto +'</option>'
            });
              $('#txtProdutos').append(html);
       
    }
});

var tbPedidos = $('#tbPedidos').DataTable( {
                    "responsive": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    //"destroy": true,
                     dom: 'Bfrtip',
                  buttons: [
                          {
                              extend: 'pdfHtml5',
                              
                          }
                      ],
                ajax: {
                    type: 'POST',
                    url: 'retornoPedidos.php',
                    dataSrc: '',

                },
                 columnDefs: [
                    {"targets": [0], "visible": true, "width": "10%","searchable": true},
                    {"targets": [1], "visible": true, "width": "5%", "searchable": false, "orderable": false},
                    {"targets": [2], "visible": true, "width": "7%", "searchable": false, "orderable": false},
                    {"targets": [3], "visible": true, "width": "10%", "searchable": false, "orderable": false,"render" : function(data, type, row){

                                return '<span class="label label-primary">'+data+'</span>';
                        }},
                    {"targets": [4], "visible": true, "width": "10%", "searchable": false, "orderable": false},
                    {"targets": [5], "visible": true, "width": "10%", "searchable": false, "orderable": false,"render" : function(data, type, row){
                                if (row.executado == 0 ){
                                return '<span class="label label-danger">Pedido Pendente </span>';
                            } else {
                                return '<span class="label label-danger">'+data+'</span>';
                            }
                               
                           
                        }},
                    {"targets": [6], "visible": true, "width": "10%", "searchable": false, "orderable": false},
                    {"targets": [7], "visible": true, "width": "10%", "searchable": false, "orderable": false},
                   
                ],
                columns: [ 
                    
                          {data: 'empresa_qtd'},
                          {data: 'pedidos'},
                          {data: 'descricao_produto'},
                          {data: 'nome'},
                          {data: 'dh_emisao'},
                          {data: 'executado'},
                          {
                      "render": function (data, type, row) {
                        return "<a href='statusPedido.php?id=" + row.idPedido + "' class='btn btn-success' id='btnStatus'><i class='fas fa-edit'> Confirma Pedido</i></a>"
                      }},
                      {
                        "render": function (data, type, row) {
                        return "<a href='statusPedido.php?id=" + row.idPedido + "' class='btn btn-primary' id='btnStatus'><i class='fas fa-edit'> Editar Pedido</i></a>"
                      }
                      }

                 ]
            } );


   $( "#btnPedido" ).click(function(e) {
         e.preventDefault();

        
        var txtNomeEmpresa = $("#txtNomeEmpresa").val();
        var txtProdutos = $("#txtProdutos").val();
        var txtQuantidade = $("#txtQuantidade").val();
             $.ajax({
                url: "addPedidos.php",
                type: 'POST',
                data: {txtNomeEmpresa:txtNomeEmpresa,txtProdutos:txtProdutos,txtQuantidade:txtQuantidade},
                success: function(data) {
                $("#txtNomeEmpresa").val(" ");
                  $("#txtQuantidade").val(" ");
                   tbPedidos.ajax.reload(null, false);
                   Swal.fire(
                    'Salvo!',
                     data,
                    'success'
                  )

                }

              });
           
      });
  

   $('#FormRelatoriosProduto').on('submit', function(e){
            e.preventDefault();
            const txtDataInicio = $("#txtDataInicio").val();
            const txtDataFim = $("#txtDataFim").val();
            $('#tbRelatorioPedidos').DataTable( {
                            "responsive": true,
                            "scrollY": "300px",
                            "scrollCollapse": true,
                            "destroy": true,
                             dom: 'Bfrtip',
                          buttons: [
                                  {
                                      extend: 'pdfHtml5',
                                      
                                  }
                              ],
                        ajax: {
                            type: 'POST',
                            url: 'relatorios/relatorioPedidos.php',
                            data:{txtDataInicio:txtDataInicio, txtDataFim:txtDataFim},
                            dataSrc: '',

                        },
                         columnDefs: [
                            {"targets": [0], "visible": true, "width": "10%","searchable": true},
                            {"targets": [1], "visible": true, "width": "5%", "searchable": false, "orderable": false},
                            {"targets": [2], "visible": true, "width": "7%", "searchable": false, "orderable": false},
                            {"targets": [3], "visible": true, "width": "10%", "searchable": false, "orderable": false,"render" : function(data, type, row){

                                        return '<span class="label label-primary">'+data+'</span>';
                                }},
                            {"targets": [4], "visible": true, "width": "10%", "searchable": false, "orderable": false},
                            {"targets": [5], "visible": true, "width": "10%", "searchable": false, "orderable": false,"render" : function(data, type, row){
                                        if (row.executado == 1 ){
                                        return '<span class="label label-success">Pedido Executado </span>';
                                    } else {
                                        return '<span class="label label-danger">'+data+'</span>';
                                    }
                                       
                                   
                                }},
                           
                        ],
                        columns: [ 
                            
                                  {data: 'empresa_qtd'},
                                  {data: 'pedidos'},
                                  {data: 'descricao_produto'},
                                  {data: 'nome'},
                                  {data: 'dh_execucao'},
                                  {data: 'executado'},
                                
                              
                         ]
                    } );

    });






