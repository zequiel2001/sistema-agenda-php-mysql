<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <title>Document</title>
</head>
<body>

<?php
error_reporting(0); //Tirando os erros de Warring da tela
include "cons.php"; // Chamando outro arquivo, no caso o arquivo que faz a conexão com banco de dados

//Esta função cria uma conexão com o banco de dados
Function banco($server, $user, $password, $db, $consulta){  
  $banco = new mysqli($server, $user, $password, $db);
  $resultado = $banco->query($consulta);
  $banco->close();
  return $resultado;
}

//Esrá função retorna em forma de tabela os cadastros que estão no banco de dados de acordo com a condição que foi passada 
Function mostrar($result, $tipo){
  
  //Está condição apenas mostra os dados do cadastro em forma de tabela, mais organizada.
  if ($tipo == "Tabela"){
    echo "<div class='box'>";
    echo"<table border=1 class='tabelinha'>";
    echo "<tr><td class='titlee'>Foto</td><td class='titlee'>Nome</td><td class='titlee'>Email</td><td class='titlee'>CPF</td><td class='titlee'>Telefone</td><td class='titlee'>Cidade</td><td class='titlee'>Estado</td><td class='titlee'>Data Nascimento</td><td class='titlee'>Idade</td><tr>";
    while ($linha = $result->fetch_assoc()){
      echo "<td class='boxx'><img class='imagem' src='upload/".$linha["cod"].".jpg'";
      echo "<tr><td class='boxx'>".$linha["nome"]."</td>";
      echo "<td class='boxx'>".$linha["email"]."</td>";
      echo "<td class='boxx'>".$linha["cpf"]."</td>";
      echo "<td class='boxx'>".$linha["fone"]."</td>";
      echo "<td class='boxx'>".$linha["cidade"]."</td>";
      echo "<td class='boxx'>".$linha["estado"]."</td>";
      echo "<td class='boxx'>".$linha["dia"]."/".$linha["mes"]."/".$linha["ano"]."</td>";
      $data_atual = date('Y');
      $idade = $data_atual - $linha["ano"];
      echo "<td class='boxx'>Idade ".$idade."</td><tr>";  
    }
    echo"</table>";
    echo "</div>";  
  } 

  //Está mostra novamente e formulario para fazer atualizações
  if ($tipo == "Atualiza"){
    //Serie de codições para mostrar a data no formato adequado
    if ($linha = $result->fetch_assoc()){
      if ($linha["mes"] < 10 and $linha["dia"] > 10){
          $d = $linha["ano"]."-0".$linha["mes"]."-".$linha["dia"];
      }else{
          if ($linha["mes"] > 10 and $linha["dia"] < 10){
              $d = $linha["ano"]."-".$linha["mes"]."-0".$linha["dia"];
          }else{
              if ($linha["mes"] < 10 and $linha["dia"] < 10){
                  $d = $linha["ano"]."-0".$linha["mes"]."-0".$linha["dia"];
              }else{
                  $d = $linha["ano"]."-".$linha["mes"]."-".$linha["dia"];
              }
          }
      }
    }
    //Para retornar em tela os dados da pessoa cadastrada, dentro do formulario foi usado um value para montra a informação conrrespondente
    //a que foi solicitado.
    echo "<form class='dados' method = 'POST' action='pdo.php' enctype='multipart/form-data'>
        <ul>
            <li>
                <h2>Sistema de Cadastro</h2>
                <span class='obrigatorio'>*Todos os campus obrigatorios</span>
            </li>
            <li>
                <label>Insira sua Foto:</label>
                <input class='butt' type='file' name='arquivo'/>
                <span>Foto</span>
            </li>
            <li>
            <input type='hidden' name='cod' value =' ".$linha["cod"]."'/>
                <label>Nome:</label>
                <input type='text' name='nome' value = '".$linha["nome"]."'/>
                <span>Nome completo</span>
            </li>
            <li>
                <label>Endereço:</label>
                <input type='text' name='end' value = '".$linha["endereco"]."'/>
                <span>Endereço completo</span>
            </li>
            <li>
                <label>cep:</label>
                <input type='text' name='cep' value = '".$linha["cep"]."'/>
                <span>Endereço completo</span>
            </li>
            <li>
              <div class='notas1'>
                  <p>Cidade:</p>
                      <select class='selecao' name= 'cidade'>";
                      //criando um select com php para manter selecionado o valor de o usuario selecionou
                      include "cons.php";
                      for ($I = 0; $I <= 9; $I++){
                        if($linha["cidade"] == $ci[$I]){
                          echo "<option value = '".$ci[$I]."' selected>".$ci[$I]."</option>";
                        }else{
                          echo "<option value = '".$ci[$I]."'>".$ci[$I]."</option>";
                        }
      
                      }
                      echo "</select>";
              echo "</div>";
              echo "<div class='notas2'>";
                  echo "<p>Estado:</p>";
                  echo "<select class='selecao' name= 'uf'>";
                  //criando um select com php para manter selecionado o valor de o usuario selecionou
                  include "cons.php";
                  for ($I = 0; $I <= 9; $I++){
                      if ($linha["estado"] == $u[$I]){
                          echo "<option value = '".$u[$I]."' selected>".$u[$I]."</option>";
                      }else{
                        echo "<option value = '".$u[$I]."'>".$u[$I]."</option>";

                      }
                  }
                  echo "</select><br/>";
              echo "</div>";
          echo "</li>";
            echo "<li>
                <label>Email:</label>
                <input type='text' name='email' value = '".$linha["email"]."'/>
                <span>Email</span>
            </li>
            <li>
                <label>Telefone:</label>
                <input type='text' name='fone' onblur='mascaraDeTelefone(this)' value = '".$linha["fone"]."'/>
                <span>Telefone Completo</span>
            </li>
            <li>
                <label>CPF:</label>
                <input type='text' name='cpf' onblur='mascaraDeCpf(this)' value = '".$linha["cpf"]."'/>
                <span>CPF completo sem ponto e traços</span>  
            </li>
            <li>
                <label>Data De Nascimento:</label>
                <input id='date' name='data' type='text' value = '".$d."'>
                <span>Data</span>
            </li>
            <li>
                <button class='submit' name='B6' type='submit'>Salvar</button>  
            </li>
        </ul>   
        </form>";
  }     
}


        
//Esta é a função mais importante onde nela e feita os cadastro, atualizações, consultas etc
Function pesquisa($S, $cod, $nome, $end, $email, $fone, $d,$m, $a, $cep, $cidade, $uf, $cpf, $niver_mes){

  // Foi usado um swite case para executar um comando em sql em cada caso que variavel select vinda dos botões  
  switch ($S) {
    case 1:
      //inserindo os dados no banco de dados
      $resultado = "INSERT INTO agenda(cod, nome, endereco, email, fone, dia, mes, ano, cep, cidade, estado, cpf) VALUES (Null, '$nome', '$end', '$email', '$fone', $d, $m, $a, '$cep', '$cidade', '$uf', '$cpf')";
    break;
    case 2:
      //Exibindo com o comando select todo o bando ordenado por nome
      $resultado = "select * from agenda order by nome";
      if($nome <> Null){
        //Realizando uma connsulta por nome no banco de dados
        $resultado = "select * from agenda where nome = '$nome'";
      }
      if($email <> Null){
        //Realizando um cansulta por email no banco
        $resultado = "select * from agenda where email = '$email'";
      }
    break;
    case 3:
      //Comando em sql que apaga uma informação do banco        
      $resultado = "DELETE FROM agenda WHERE nome = '$nome'";
    break;
    case 4:     
      //Realizando a atualização de dados cadastrais em salvando no banco  
      $resultado = "UPDATE agenda SET cod = $cod, nome='$nome', endereco='$end', email='$email', fone='$fone', dia=$d, mes=$m, ano=$a, cep ='$cep', cidade ='$cidade', estado ='$uf', cpf='$cpf'  WHERE cod = $cod";
    break;
    case 5:   
      //Retornado os aniversariantes do mês de acordo com o mes de foi informado pelo usuario    
      $resultado = "select * from agenda where mes = '$niver_mes'";
    break;
  }	
      return $resultado;
}
    
  ?>
</body>
</html>