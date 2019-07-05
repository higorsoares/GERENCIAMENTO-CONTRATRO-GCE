var tbVendas = $('#tbVendas').DataTable( {
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
                    url: 'retornoVendaCadastro.php',
                    dataSrc: '',

                },
                columns: [ 

                    
                          {data: 'descricao_produto'},
                          {data: 'empresa'},
                          {data: 'vendaQtd'},
                          {data: 'frete'},
                          {data: 'dh_cadastro'},
                          {
                      "render": function (data, type, row) {
                          return "<a href='editarQuantidade.php?id=" + row.id_venda + "' class='btn btn-primary'><i class='fas fa-edit'> Alterar </i></a>"
                      }},

                          


                 ]
            } );





  
      $( "#btnVenda" ).click(function(e) {
         e.preventDefault();
        
        var txtProdudo = $("#txtProdudo").val();
        console.log(txtProdudo);
        var txtQuantidade = $("#txtQuantidade").val();
        var txtEmpresa = $("#txtEmpresa").val();
        var txtFrete = $("#txtFrete").val();
        
             $.ajax({
                url: "addVenda.php",
                type: 'POST',
                data: {txtProdudo:txtProdudo,txtQuantidade:txtQuantidade,txtEmpresa:txtEmpresa,txtFrete:txtFrete},
                success: function(data) {
                $("#txtQuantidade").val(" ");
                  $("#txtEmpresa").val(" ");
                    $("#txtFrete").val(" ");
                     tbVendas.ajax.reload(null, false);
                   Swal.fire(
                    'Salvo!',
                     data,
                    'success'
                  )

                }

              });
           
      });

      





 


