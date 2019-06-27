$('#tbProdutos').DataTable( {
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
                    url: 'retornoProdutosCadastro.php',
                    dataSrc: '',

                },
                columns: [ 

                      
                    
                          {data: 'descricao_produto'},
                          {data: 'dh_cadastro'},
                          {data: 'nome'},
                          {
                      "render": function (data, type, row) {
                          return "<a href='editarProduto.php?id=" + row.id_produto + "' class='btn btn-primary'>Alterar Produto</a>"
                      }},

                          


                 ]
            } );