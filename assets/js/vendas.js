$('#tbVendas').DataTable( {
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