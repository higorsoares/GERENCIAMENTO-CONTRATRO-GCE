$("document").ready( function() {
$('#formCategoria').on('submit', function(e){
    e.preventDefault();

       var txtCategoria = $('#txtCategoria').val();
        
          $('#table').DataTable( {
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
                    data:{txtCategoria:txtCategoria},
                    url: 'testeClass.php',
                    dataSrc: '',

                },
                columns: [ 

                      
                    
                          {data: 'razao_social'},
                          {data: 'nome_responsavel'},
                          {data: 'telefone_contato'},
                          {data: 'descricao'},
                          {data: 'dh_cadastro'},
                          {
                      "render": function (data, type, row) {
                          return "<a href='editarContrato.php?id=" + row.id_emp + "' class='btn btn-primary'><i class='fas fa-edit'> Visualizar Contrato </i></a>"
                      }},

                          


                 ]
            } );

    });

});

$.ajax({
    url: "Api/retorno.php",
    type: 'POST',
    contentType: 'application/json',
    success: function(data) {
        console.log(data[0].ctrCom);

      
        $("#txtDocEnv").html(data[0].ctrEnv);
        $("#txtDocPen").html(data[0].ctrPend);
   
        $("#txtDocPag").html(data[0].ctrPg);
        $("#txtDocAvi").html(data[0].ctrAv);

    }
});



$('#formPesquisa').on('submit', function(e){
    e.preventDefault();

    var txtDataInicio = $("#txtDataInicio").val();
    var txtDataFim = $("#txtDataFim").val();
    $.ajax({
    url: "retornoContratosApi.php",
    type: 'POST',
    data: {txtDataInicio:txtDataInicio,txtDataFim:txtDataFim},
    success: function(data) {

        var dataa = typeof data ==='string'? JSON.parse(data):data;
        console.log(dataa);
        console.log(txtDataInicio);

       
        $("#txtDocEnv").html(dataa[0].ctrEnv);
        $("#txtDocPen").html(dataa[0].ctrPend);

        $("#txtDocPag").html(dataa[0].ctrPg);
        $("#txtDocAvi").html(dataa[0].ctrAv);


        
        var txtDocEnv   = [];
        var txtDocPen   = [];
        

        var txtDocPag   = [];
        var txtDocAvi   = [];

        

        txtDocEnv.push(dataa[0].ctrEnv);
        txtDocPen.push(dataa[0].ctrPend);
        
        txtDocPag.push(dataa[0].ctrPg);
        txtDocAvi.push(dataa[0].ctrAv);
        


        var ctx = $('#myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [
                    {
                        label: ['Doc Enviada'],
                        backgroundColor: ["#FFFF00"],
                        borderColor:  'rgba(255,99,132,1)',
                        hoverBackgroundColor: ["#FFFF00"],
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: txtDocEnv

                    },{
                        label: ['Doc Pendente'],
                        backgroundColor: ["#FF0000"],
                        borderColor:  'rgba(255,99,132,1)',
                        hoverBackgroundColor: ["#FF0000"],
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: txtDocPen
                    },{
                        label: ['Contratos Pagos'],
                        backgroundColor: ["#DAA520"],
                        borderColor:  'rgba(255,99,132,1)',
                        hoverBackgroundColor: 'rgba(155, 58, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: txtDocPag
                    },{
                        label: ['Contratos Pg avs'],
                        backgroundColor: ["#E0FFFF"],
                        borderColor:  'rgba(255,99,132,1)',
                        hoverBackgroundColor: ["#E0FFFF"],
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: txtDocAvi
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });



    }
});

  });


 $(document).on("change", "#FormCadastroContrato #txtValorMensal", function(){

    var ValorTotal = $("#valor").val();
    var ValorPago  = $("#txtValorMensal").val();

    var Result = ValorTotal - ValorPago;

    $("#txtRestante").val(Result);

    console.log("Teste");

 });



 $('#valor').mask('000.000.000.000.000.00', {reverse: true});
 $('#txtValorMensal').mask('000.000.000.000.000.00', {reverse: true});
 //$('#txtRestante').mask('000.000.000.000.000.00', {reverse: true});
