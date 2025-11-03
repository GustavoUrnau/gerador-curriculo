
<?php
session_start();

// Validar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Sanitizar dados
    $dados = [];
    
    // Dados Pessoais
    $dados['nome'] = htmlspecialchars($_POST['nome'] ?? '');
    $dados['email'] = htmlspecialchars($_POST['email'] ?? '');
    $dados['telefone'] = htmlspecialchars($_POST['telefone'] ?? '');
    $dados['endereco'] = htmlspecialchars($_POST['endereco'] ?? '');
    $dados['data_nascimento'] = htmlspecialchars($_POST['data_nascimento'] ?? '');
    $dados['idade'] = htmlspecialchars($_POST['idade'] ?? '');
    $dados['resumo'] = htmlspecialchars($_POST['resumo'] ?? '');
    
    // Formação (arrays)
    $dados['formacoes'] = [];
    if (!empty($_POST['formacao_instituicao'])) {
        foreach ($_POST['formacao_instituicao'] as $i => $instituicao) {
            if (!empty($instituicao)) {
                $dados['formacoes'][] = [
                    'instituicao' => htmlspecialchars($instituicao),
                    'curso' => htmlspecialchars($_POST['formacao_curso'][$i] ?? ''),
                    'ano' => htmlspecialchars($_POST['formacao_ano'][$i] ?? '')
                ];
            }
        }
    }
    
    // Experiência (arrays)
    $dados['experiencias'] = [];
    if (!empty($_POST['exp_empresa'])) {
        foreach ($_POST['exp_empresa'] as $i => $empresa) {
            if (!empty($empresa)) {
                $dados['experiencias'][] = [
                    'empresa' => htmlspecialchars($empresa),
                    'cargo' => htmlspecialchars($_POST['exp_cargo'][$i] ?? ''),
                    'de' => htmlspecialchars($_POST['exp_de'][$i] ?? ''),
                    'ate' => htmlspecialchars($_POST['exp_ate'][$i] ?? ''),
                    'descricao' => htmlspecialchars($_POST['exp_descricao'][$i] ?? '')
                ];
            }
        }
    }
    
    // Competências (arrays)
    $dados['competencias'] = [];
    if (!empty($_POST['competencias'])) {
        foreach ($_POST['competencias'] as $comp) {
            if (!empty($comp)) {
                $dados['competencias'][] = htmlspecialchars($comp);
            }
        }
    }
    
    // Referências (arrays)
    $dados['referencias'] = [];
    if (!empty($_POST['ref_nome'])) {
        foreach ($_POST['ref_nome'] as $i => $nome) {
            if (!empty($nome)) {
                $dados['referencias'][] = [
                    'nome' => htmlspecialchars($nome),
                    'cargo' => htmlspecialchars($_POST['ref_cargo'][$i] ?? ''),
                    'telefone' => htmlspecialchars($_POST['ref_telefone'][$i] ?? ''),
                    'email' => htmlspecialchars($_POST['ref_email'][$i] ?? '')
                ];
            }
        }
    }
    
    // Armazenar dados na sessão
    $_SESSION['curriculo'] = $dados;
    
    // Redirecionar para visualizar
    header('Location: visualizar.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
```