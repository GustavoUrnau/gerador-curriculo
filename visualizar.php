
<?php
session_start();

// Verificar se os dados existem
if (!isset($_SESSION['curriculo'])) {
    header('Location: index.php');
    exit;
}

$dados = $_SESSION['curriculo'];
$data_nascimento = new DateTime($dados['data_nascimento']);
$hoje = new DateTime();
$idade_calculada = $hoje->diff($data_nascimento)->y;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Currículo - <?php echo $dados['nome']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white; }
            .curriculo-container { box-shadow: none; }
        }
    </style>
</head>
<body>
    <div class="container-fluid no-print py-3 bg-light">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>📄 Seu Currículo</h1>
            <div class="gap-2">
                <button class="btn btn-primary" onclick="window.print()">🖨️ Imprimir/Gerar PDF</button>
                <a href="index.php" class="btn btn-secondary">← Voltar</a>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="curriculo-container bg-white p-5 shadow">
            
            <!-- CABEÇALHO -->
            <div class="text-center border-bottom pb-4 mb-4">
                <h1 class="mb-0"><?php echo $dados['nome']; ?></h1>
                <p class="text-muted mb-2"><?php echo $idade_calculada; ?> anos | <?php echo $dados['endereco']; ?></p>
                <p class="mb-0">
                    📧 <?php echo $dados['email']; ?> | 📱 <?php echo $dados['telefone']; ?>
                </p>
            </div>

            <!-- RESUMO PROFISSIONAL -->
            <?php if (!empty($dados['resumo'])): ?>
            <section class="mb-4">
                <h3 class="border-bottom pb-2 mb-3">Resumo Profissional</h3>
                <p><?php echo nl2br($dados['resumo']); ?></p>
            </section>
            <?php endif; ?>

            <!-- FORMAÇÃO ACADÊMICA -->
            <?php if (!empty($dados['formacoes'])): ?>
            <section class="mb-4">
                <h3 class="border-bottom pb-2 mb-3">🎓 Formação Acadêmica</h3>
                <?php foreach ($dados['formacoes'] as $formacao): ?>
                <div class="mb-3">
                    <h5 class="mb-1"><?php echo $formacao['curso']; ?></h5>
                    <p class="mb-1 text-muted"><?php echo $formacao['instituicao']; ?> - <?php echo $formacao['ano']; ?></p>
                </div>
                <?php endforeach; ?>
            </section>
            <?php endif; ?>

            <!-- EXPERIÊNCIA PROFISSIONAL -->
            <?php if (!empty($dados['experiencias'])): ?>
            <section class="mb-4">
                <h3 class="border-bottom pb-2 mb-3">💼 Experiência Profissional</h3>
                <?php foreach ($dados['experiencias'] as $exp): ?>
                <div class="mb-4">
                    <h5 class="mb-1"><?php echo $exp['cargo']; ?></h5>
                    <p class="mb-2 text-muted"><?php echo $exp['empresa']; ?> | <?php echo $exp['de']; ?> até <?php echo $exp['ate']; ?></p>
                    <p><?php echo nl2br($exp['descricao']); ?></p>
                </div>
                <?php endforeach; ?>
            </section>
            <?php endif; ?>

            <!-- COMPETÊNCIAS -->
            <?php if (!empty($dados['competencias'])): ?>
            <section class="mb-4">
                <h3 class="border-bottom pb-2 mb-3">🎯 Competências</h3>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($dados['competencias'] as $comp): ?>
                    <span class="badge bg-primary"><?php echo $comp; ?></span>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>

            <!-- REFERÊNCIAS -->
            <?php if (!empty($dados['referencias'])): ?>
            <section class="mb-4">
                <h3 class="border-bottom pb-2 mb-3"> Referências Profissionais</h3>
                <?php foreach ($dados['referencias'] as $ref): ?>
                <div class="mb-3">
                    <h5 class="mb-1"><?php echo $ref['nome']; ?></h5>
                    <p class="mb-1 text-muted"><?php echo $ref['cargo']; ?></p>
                    <p class="mb-0">📧 <?php echo $ref['email']; ?> | 📱 <?php echo $ref['telefone']; ?></p>
                </div>
                <?php endforeach; ?>
            </section>
            <?php endif; ?>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```