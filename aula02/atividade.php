<?php

$formulario = array(
    'id'=>'formCadastro',
    'tipo_submit'=>'POST', 
    'url_submit'=>'cadastro.php', 
    'itens'=> array(
        'nome'=>array('tipo'=> 'text', 'nome'=> 'nome', 'label'=> 'Nome', 'placeholder'=> 'Informe seu nome.'),
        'idade'=>array('tipo'=> 'number', 'nome'=> 'idade', 'label'=> 'Idade', 'placeholder'=> 'Informe sua idade.', 'funcao_validacao'=> 'validaIdade'),
        'sexo'=>array('tipo'=> 'radio', 'nome'=> 'sexo', 'label'=> 'Sexo', 'opcoes'=> array("M"=> "Masculino", "F"=>"Feminino", "O"=>"Outros")),
        'esporte_preferido'=>array('tipo'=> 'checkbox', 'nome'=> 'esporte_preferido', 'label'=> 'Esporte Pref.', 'opcoes'=> array("F"=> "Futebol", "V"=>"Vôlei", "N"=>"Natação", "O"=> "Outros"), 'obrigatorio'=>false),
        'cidade_nascimento'=>array('tipo'=> 'text', 'nome'=> 'cidade', 'label'=> 'Cidade de Nasc.', 'placeholder'=> 'Informe a cidade que você nasceu.'),
        'estado_nascimento'=>array('tipo'=> 'select', 'nome'=> 'estado_nascimento', 'label'=> 'Estado de Nasc.', 'opcoes'=> array("RJ"=> "Rio de Janeiro", "SP"=>"São Paulo", "ES"=>"Espírito Santo", "MG"=>"Minas Gerais", "O"=> "Outros")),
        'cpf'=>array('tipo'=> 'number', 'nome'=> 'cpf', 'label'=> 'CPF', 'placeholder'=> 'Informe seu CPF.', 'funcao_validacao'=> 'validaCpf'),
        'botao_enviar'=>array('tipo'=> 'submit', 'nome'=> 'enviar', 'label'=> 'Enviar'),
        'botao_limpar_form'=>array('tipo'=> 'reset', 'nome'=> 'reset', 'label'=> 'Limpar Formulário'),
    )
);
function criarFormulario($formulario){
    echo "<form action= ' " .$formulario["url_submit"]. "' method = ' ". $formulario["tipo_submit"] . ">";
    foreach($formulario["itens"] as $id => $item){
        criarCampo($id, $item);
    }
    echo "</form>";
}

function criarCampo($id, $item){
    echo "<div>";
    echo "<label for='" .$id . "'> '" .$item['label'] ."</label>";
    switch ($item['tipo']) {
        case "text":
        case "number":
            echo criarInputText($id, $item);
            break;

        case "textarea":
            echo criarTextarea($id, $item);
            break;

        case "radio":
        case "checkbox":
            echo criarRadioCheckbox($id, $item);
            break;

        case "select":
            echo criarSelect($id, $item);
            break;

        case "submit":
        case "reset":
            echo criarBotao($id, $item);
            break;
    }
    echo "</div>";

}

function criarInputText($id, $item){
    echo "<input type = '".$item['tipo'] . "id= '".$id . "name= '" .$item['nome'] . "placeholder= '" .$item['placeholder'] . "value= '" .$item[''] . ">";
}

function criarTextarea($id, $item){
    echo "<textarea id= '" .$id . "name = '" .$item['nome'] . "placeholder= '" .$item['placeholder'] . $item['obrigatorio'] . ">" . $item[''] . "</textarea>";
}
function criarSelect($id, $item){
    echo "<select id='" .$id . "name= '" .$item['nome'] .">";
    foreach($item['opcoes'] as $opcao){
        echo "<option value='" .$opcao . ">'" .$opcao . "</option>";
    }
}

function criarBotao($id, $item){
    echo "<button type='" . $item['tipo'] . "id='" .$id . " name='" .$item['nome'] . ">'" .$item['label'] . "</button>";
}

function criarRadioCheckbox($id, $item){
    foreach ($item['opcoes'] as $opcao) 
        echo "<input type='" .$item['tipo'] . "id='" .$opcao ." name='" .$item['nome'] . "value='" .$opcao . "/>";
        echo "<label for='" .$opcao . ">'" .$opcao. "</label>";
    }

?>
