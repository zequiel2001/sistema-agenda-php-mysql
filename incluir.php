<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Sistema Agenda</title>
</head>
<script type="text/javascript">
    function mascaraDeTelefone( telefone ){
            const textoAtual = telefone.value;
            const isCelular = textoAtual.length === 11;
            let textoAjustado;
            if(isCelular) {
                  const parte1 = textoAtual.slice(0,2);
                  const parte2 = textoAtual.slice(2,7);
                  const parte3 = textoAtual.slice(7,11);
                  textoAjustado = `(${parte1})${parte2}-${parte3}`;       
            } else
{
                  const parte1 = textoAtual.slice(0,2);
                  const parte2 = textoAtual.slice(2,6);
                  const parte3 = textoAtual.slice(6,10);
                  textoAjustado = `(${parte1})${parte2}-${parte3}`; 
            }

           telefone.value = textoAjustado;
}

    function mascaraDeCpf (  cpf ){
        const textoAtual = cpf.value;
        let textoAjustado;
        const parte1 = textoAtual.slice(0,3);
        const parte2 = textoAtual.slice(3,6);
        const parte3 = textoAtual.slice(6,9);
        const parte4 = textoAtual.slice(9,11);
        textoAjustado = `${parte1}.${parte2}.${parte3}-${parte4}`;
        cpf.value = textoAjustado;
    }

</script>
<?php
error_reporting(0);
?>
<body>
    <form class="dados" method = "POST" action="pdo.php" enctype="multipart/form-data">
        <ul>
            <li>
                 <h2>Sistema de Cadastro</h2>
                 <span class="obrigatorio">*Todos os campus obrigatorios</span>
            </li>
            <li>
                <label>Insira sua Foto:</label>
                <input class='butt' type="file" name="arquivo"/>
                <span>Foto</span>
            </li>
            <li>
                <label>Nome:</label>
                <input type="text" name="nome" />
                <span>Nome completo</span>
            </li>
            <li>
                <label>Endereço:</label>
                <input type="text" name="end" />
                <span>Endereço completo</span>
            </li>
            <li>
                <label>CEP:</label>
                <input type="text" name="cep" />
                <span>O cep da sua cidade</span>
            </li>
            <li>
                <div class="notas1">
                    <p>Cidade:</p>
                    <?php
                        include "cons.php";
                        echo "<select class='selecao' name= 'cidade'>";
                        for ($I = 0; $I <= 9; $I++){
                            echo "<option value = '".$ci[$I]."'>".$ci[$I]."</option>";
                        }
                        echo "</select>";
                    ?>
                </div>
                <div class="notas2">
                    <p>Estado:</p>
                    <?php
                        include "cons.php";
                        echo "<select class='selecao' name= 'uf'>";
                        for ($I = 0; $I <= 9; $I++){
                            echo "<option value = '".$u[$I]."'>".$u[$I]."</option>";
                        }
                        echo "</select><br/>";
                    ?>
                </div>
            </li>
            <li>
                <label>Email:</label>
                <input type="email" name="email" />
                <span>Informe seu email principal</span>
            </li>
            <li>
                <label>Telefone:</label>
                <input type="text" name="fone" onblur="mascaraDeTelefone(this)"/>
                <span>Telefone Completo com o DD</span>
            </li>
            <li>
                <label>CPF:</label>
                <input type="text" name="cpf" onblur="mascaraDeCpf(this)"/>
                <span>CPF completo sem ponto e traços</span>
            </li>
            
            <li>
                <label>Data De Nascimento::</label>
                <input id="date" name="data" type="date">
                <span>Data</span>
            </li>
            <li>
                <label>Aniversariante do Mês:</label>
                <input type="text" name="niver_mes" />
                <span>Informe apenas o mês que deseja saber seus aniversariantes:</span>
            </li>
            <li>
                <button class="submit" name="B1" type="submit">Salvar</button>
                <button class="submit" name="B2" type="submit">Exibir</button>
                <button class="submit" name="B3" type="submit">Encontrar</button>
                <button class="submit" name="B4" type="submit">Deletar</button>
                <button class="submit" name="B5" type="submit">Atualizar</button>
                <button class="submit" name="B7" type="submit">Aniversário</button>
                
            </li>
        </ul>   
    </form>
</body>
</html>