 /*
  *
  *   Formulario de Informações ####
  *
  */
  $("#btn-informacoes").click( () => {
     let datas = {
          tipo_pessoa : $("#tipopessoa").val() == "" ? undefined : $("#tipopessoa").val() ,
          cpf : $("#cpf").val()  == "" ? undefined : $("#cpf").val() ,
          cnpj : $("#cnpj").val() == "" ? undefined : $("#cnpj").val() ,
          razao_social : $("#razao_social").val() == "" ? undefined : $("#razao_social").val() ,
          nome_fantasia : $("#nome_fantasia").val() == "" ? undefined : $("#nome_fantasia").val() ,
          logomarca : $("#logo_marca").val() == "" ? undefined : $("#logo_marca").val() ,
          proprietario : $("#proprietario").val() == "" ? undefined : $("#proprietario").val() ,
          gerente : $("#gerente").val() == "" ? undefined : $("#gerente").val() ,
          departamento : $("#departamento").val() == "" ? undefined : $("#departamento").val(),
     };
     //console.log(datas);
     /*
              {
                "tipopessoa": "FÍSICA",
                "cpf": "14557778965",
                "cnjp": "XX.XXX.XXX/XXXX-XX",
                "razao_social": "Empresa tal",
                "nome_fantasia": "Empresa tal",
                "logomarca": "EMPT",
                "proprietario": "Jefferson",
                "gerente": "Ayrton",
                "departamento": "Fiaças"
              } 
          */

     $.ajax({
        method: "PUT",
        url: `../../controller/put_informacoes.php`,
        data : datas,
      
        success: function (data) {
              /*retorno*/
              console.log(data);
              data = JSON.parse(data);
              data.info == true ? alert("sucesso!") : alert("erro!")
        }
      });

      
  });
 
