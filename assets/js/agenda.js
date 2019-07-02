$('#tbAgenda').DataTable( {
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
                    url: 'retornoAgenda.php',
                   
                    dataSrc: '',

                },
                columnDefs: [
                    {"targets": [0], "visible": true, "width": "10%","searchable": true},
                    {"targets": [1], "visible": true, "width": "5%", "searchable": false, "orderable": false},
                    {"targets": [2], "visible": true, "width": "7%", "searchable": false, "orderable": false},
                    {"targets": [3], "visible": true, "width": "10%", "searchable": false, "orderable": false,"render" : function(data, type, row){
                            console.log(row.valor_restante);
                            if (row.valor_restante > 49){
                                return '<span class="label label-danger">'+data+'</span>';
                            } else {
                                return '<span class="label label-danger">'+data+'</span>';
                            }
                        }},
                    {"targets": [4], "visible": true, "width": "10%", "searchable": false, "orderable": false},
                   
                    
                ],
                columns: [ 
                          {data: 'razao_social'},
                          {data: 'nome_responsavel'},
                          {data: 'telefone_contato'},
                          {data: 'valor_restante'},
                          {data: 'dh_pagamento'},
                        
                 ]
            } );