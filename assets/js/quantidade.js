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
                          return "<a href='editarQuantidade.php?id=" + row.idQtd + "' class='btn btn-primary'>Alterar Quantidade</a>"
                      }},

                          


                 ]
            } );