<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="estilo.css">
   <title>resultado</title>
</head>
<body>
<?php
extract($_POST);
//Estou trazendo com o include os dados o funções de outros arqquivos
include "cons.php";
include "DLL.php";

// Separando junta em variaveis separadas
$lista = explode("-", $data);
   $a = $lista[0];
   $m = $lista[1];
   $d = $lista[2];

//Botão para caso o usuario quiser salvar seu cadastro no banco de dados
if (isset($B1)){

   $select= 1; 
   $consulta = pesquisa($select, NULL, $nome, $end, $email, $fone, $d,$m, $a, $cep, $cidade, $uf, $cpf, $niver_mes);
   $result = banco($server, $user, $password, $db, $consulta);  
   echo " <div class='figura'>
                  <img class='mage' src='img/fig7.png'>
               </div>
               <div class='figura'>
                  <p class='texto_result'>Parabens ! Você foi cadastrado com Sucesso em nossa Database<br>
               </div>
               ";
   //Junto com o cadastro dos dados foi feita a inclusão da foto referente ao usuario cadastrado
   if(isset($_FILES['arquivo'])){
      $select= 2;
      $consulta = pesquisa($select, NULL, $nome, $end, $email, $fone, $d,$m, $a, $cep, $cidade, $uf, $cpf, $niver_mes);
      $result = banco($server, $user, $password, $db, $consulta);
      $linha = $result->fetch_assoc();
      $target = "upload/".$linha["cod"].".jpg";
      if (move_uploaded_file($_FILES['arquivo']['tmp_name'],$target));
   else{
      echo "Nenhuma foto foi selecionada";
   }

   }

} 

//Este botão exibe todos os cadastros que estão salvaos em forma de tabela
if (isset($B2)){
   $select= 2;
   $consulta = pesquisa($select, NULL, $nome, $end, $email, $fone, $d,$m, $a, $cep, $cidade, $uf, $cpf, $niver_mes);
   $result = banco($server, $user, $password, $db, $consulta);  
   mostrar($result, "Tabela"); 
}

//Este botão localiza o cadastro de usuario em especifico
if (isset($B3)){
   $select= 2;
   $consulta = pesquisa($select, NULL, $nome, $end, $email, $fone, $d,$m, $a, $novo_nome, $cep, $cidade, $uf, $cpf);
   $result = banco($server, $user, $password, $db, $consulta); 
   mostrar($result, "Tabela"); 
} 

//Este botão deleta um cadastro feito no sistema
if (isset($B4)){
   $select= 3;
   $consulta = pesquisa($select, NULL, $nome, $end, $email, $fone, $d,$m, $a, $novo_nome, $cep, $cidade, $uf, $cpf);
   $result = banco($server, $user, $password, $db, $consulta); 
   echo "
   <div class='figura'>
      <img class='mage' src='img/fig5.png'>
   </div>
   <div class='figura'>
   <p class='texto_result'>Seu Casdastro foi Deletado da Data base com sucesso!!!<br>
   </div>
   ";
} 

//este botão chama um formulario preenchido com a informaçoes dos usuario em especifico para fazer atualizações
if (isset($B5)){
   $select= 2;
   $consulta = pesquisa($select, NULL, $nome, $end, $email, $fone, $d,$m, $a, $cep, $cidade, $uf, $cpf, $niver_mes);
   $result = banco($server, $user, $password, $db, $consulta); 
   mostrar($result, "Atualiza");
}

//Junto com o botão B5 este salva as alterações que foram feitas
if (isset($B6)){
   $select= 4;
   $consulta = pesquisa($select, $cod, $nome, $end, $email, $fone, $d, $m, $a, $cep, $cidade, $uf, $cpf, $niver_mes);
   $result = banco($server, $user, $password, $db, $consulta); 
   echo "
   <div class='figura'>
      <img class='mage' src='img/fig6.png'>
   </div>
   <div class='figura'>
   <p class='texto_result'>Seu Casdastro foi atualizado com sucesso!!!<br>
   </div> 
   ";
}

//Este botão imprime em tabela todos os aniversariantes do mes informado com parâmetro
if (isset($B7)){
   $select= 5;
   $consulta = pesquisa($select, NULL, $nome, $end, $email, $fone, $d, $m, $a, $cep, $cidade, $uf, $cpf, $niver_mes);
   $result = banco($server, $user, $password, $db, $consulta); 
   mostrar($result, "Tabela"); 
}

echo "<br><a class='btn' href = 'incluir.php'> voltar </a>";
?>
</body>
</html>