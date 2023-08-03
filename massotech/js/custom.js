const tbody = document.querySelector(".listar-usuarios");

const listarUsuarios = async (pagina) => {

  
    const dados = await fetch("./list.php?pagina=" + pagina);

    // Ler o objeto retornado pelo arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao encontrar nenhum registro no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Recuperar o SELETOR do HTML que deve receber os registros
        const conteudo = document.querySelector(".listar-usuarios");

        // Somente acessa o IF quando existir o SELETOR ".listar-usuarios"
        if (conteudo) {

            // Enviar os dados para o arquivo HTML
            conteudo.innerHTML = resposta['dados'];
        }
    }
}

// Chamar a funcao para listar os registro do banco de dados
listarUsuarios(1);

/* Fim listar os registros do banco de dados */

/* Inicio substituir o texto pelo campo na tabela */
// Funcao responsavel em substituir o texto pelo campo na tabela e receber o ID do registro que sera editado

function editar_registro(id) {
    // Ocultar o botao editar
    document.getElementById("botao_editar" + id).style.display = "none";

    // Apresentar o botao salvar
    document.getElementById("botao_salvar" + id).style.display = "block";

    // Recuperar os valores do registro que esta na tabela
    var nome = document.getElementById("valor_nome" + id);
    var email = document.getElementById("valor_email" + id);
    var telefone = document.getElementById("valor_telefone" + id);

    // Substituir o texto pelo campo e atribuir para o campo o valor que estava na tabela
    nome.innerHTML = "<input type='text' id='nome_text" + id + "' value='" + nome.innerHTML + "'>";
    email.innerHTML = "<input type='text' id='email_text" + id + "' value='" + email.innerHTML + "'>";
    telefone.innerHTML = "<input type='text' id='telefone_text" + id + "' value='" + telefone.innerHTML + "'>";

}

/* Fim substituir o texto pelo campo na tabela */

/* Inicio editar o registro no banco de dados */
// Funcao resposavel em salvar no banco de dados e receber o id do registro que deve ser editado

async function salvar_registro(id) {
    // Recuperar os valore dos campos
    var nome_valor = document.getElementById("nome_text" + id).value;
    var email_valor = document.getElementById("email_text" + id).value;
    var telefone_valor = document.getElementById("telefone_text" + id).value;

    // Prepara a STRING de valores que deve ser enviado para o arquivo PHP responsavel em salvar no banco de dados
    var dadosForm = "id=" + id + "&nome=" + nome_valor + "&email=" + email_valor + "&telefone=" + telefone_valor;

    // Fazer a requisicao com o FETCH para um arquivo PHP e enviar atraves do metodo POST os dados do formulario
    const dados = await fetch("editar_form.php", {
        method: "POST",
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: dadosForm
    });

    // Ler o objeto, a resposta do arquivo PHP
    const resposta = await dados.json();

    // Acessa o IF quando nao conseguir editar no banco de dados
    if (!resposta['status']) {
        // Envia a mensagem de erro para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        // Envia a mensagem de sucesso para o arquivo HTML que deve ser apresentada para o usuario
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];

        // Chamar a funcao para remover a mensagem apos alguns segundos
        removerMsgAlerta();

        // Substituir os campos pelo texto que estava nos campos
        document.getElementById("valor_nome" + id).innerHTML = nome_valor;
        document.getElementById("valor_email" + id).innerHTML = email_valor;
        document.getElementById("valor_telefone" + id).innerHTML = telefone_valor;

        // Apresentar o botao editar
        document.getElementById("botao_editar" + id).style.display = "block";

        // Ocultar o botao salvar
        document.getElementById("botao_salvar" + id).style.display = "none";
    }
}

/* Fim editar o registro no banco de dados */

/* Inicio remover a mensagem em 5 segundos apos apresentar a mensagem para o usuario */
function removerMsgAlerta() {
    setTimeout(function () {
        // Substituir a mensagem
        document.getElementById("msgAlerta").innerHTML = "";
    }, 5000);
}
/* Fim remover a mensagem em 5 segundos apos apresentar a mensagem para o usuario */