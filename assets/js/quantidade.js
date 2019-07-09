$('#tbQuantidade').DataTable( {
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
                    url: 'retornoQuantidadeCadastro.php',
                    dataSrc: '',

                },
                columns: [ 

                    
                          {data: 'descricao_produto'},
                          {data: 'quantidade'},
                          {data: 'valor_produto'},
                          {data: 'nome'},
                          {
                      "render": function (data, type, row) {
                          return "<a href='editarQuantidade.php?id=" + row.idQtd + "' class='btn btn-primary'> <i class='fas fa-edit'> Alterar Quantidade </i></a>"
                      }},
                      {
                      "render": function (data, type, row) {
                          return "<a href='editaEquipamentoDefeito.php?id=" + row.idQtd + "' class='btn btn-primary'> <i class='fas fa-edit'> Add Eqpt Defeito </i></a>"
                      }},

                 ]
            } );



 $( "#btnProdutoEstrgado" ).click(function(e) {
         e.preventDefault();

        
        var txtIdQuantidade = $("#txtIdQuantidade").val();
        var txtEqptDefeito = $("#txtEqptDefeito").val();
             $.ajax({
                url: "addProdutosDefeitos.php",
                type: 'POST',
                data: {txtIdQuantidade:txtIdQuantidade,txtEqptDefeito:txtEqptDefeito},
                success: function(data) {
                $("#txtEqptDefeito").val(" ");
                   tbPedidos.ajax.reload(null, false);
                   Swal.fire(
                    'Salvo!',
                     data,
                    'success'
                  )

                }

              });
           
      });