<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículo - Profissional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">📄 Gerador de Currículo</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <form id="formCurriculo" method="POST" action="processar.php">
                    
                    <!-- SEÇÃO 1: DADOS PESSOAIS -->
                    <fieldset class="border p-3 mb-4">
                        <legend class="w-auto">👤 Dados Pessoais</legend>
                        
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo *</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone *</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" 
                                   placeholder="(11) 99999-9999" required>
                        </div>

                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" 
                                       name="data_nascimento" onchange="calcularIdade()">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="idade" class="form-label">Idade</label>
                                <input type="number" class="form-control" id="idade" 
                                       name="idade" readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="resumo" class="form-label">Resumo Profissional</label>
                            <textarea class="form-control" id="resumo" name="resumo" rows="3" 
                                      placeholder="Descreva um pouco sobre sua carreira..."></textarea>
                        </div>
                    </fieldset>

                    <!-- SEÇÃO 2: FORMAÇÃO ACADÊMICA -->
                    <fieldset class="border p-3 mb-4">
                        <legend class="w-auto">🎓 Formação Acadêmica</legend>
                        
                        <div id="containerFormacao">
                            <div class="formacao-item mb-3 p-3 border rounded">
                                <div class="mb-3">
                                    <label class="form-label">Instituição</label>
                                    <input type="text" class="form-control formacao-instituicao" 
                                           name="formacao_instituicao[]" placeholder="Ex: Universidade X">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Curso</label>
                                        <input type="text" class="form-control formacao-curso" 
                                               name="formacao_curso[]" placeholder="Ex: Engenharia de Software">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Ano de Conclusão</label>
                                        <input type="number" class="form-control formacao-ano" 
                                               name="formacao_ano[]" placeholder="2023">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="adicionarFormacao()">
                            + Adicionar Formação
                        </button>
                    </fieldset>

                    <!-- SEÇÃO 3: EXPERIÊNCIA PROFISSIONAL -->
                    <fieldset class="border p-3 mb-4">
                        <legend class="w-auto">💼 Experiência Profissional</legend>
                        
                        <div id="containerExperiencia">
                            <div class="experiencia-item mb-3 p-3 border rounded">
                                <div class="mb-3">
                                    <label class="form-label">Empresa</label>
                                    <input type="text" class="form-control exp-empresa" 
                                           name="exp_empresa[]" placeholder="Nome da empresa">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cargo</label>
                                    <input type="text" class="form-control exp-cargo" 
                                           name="exp_cargo[]" placeholder="Ex: Desenvolvedor Junior">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">De (Mês/Ano)</label>
                                        <input type="date" class="form-control exp-de" name="exp_de[]">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Até (Mês/Ano)</label>
                                        <input type="date" class="form-control exp-ate" name="exp_ate[]">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Descrição das Atividades</label>
                                    <textarea class="form-control exp-descricao" name="exp_descricao[]" 
                                              rows="2" placeholder="Descreva suas atividades..."></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="adicionarExperiencia()">
                            + Adicionar Experiência
                        </button>
                    </fieldset>

                    <!-- SEÇÃO 4: COMPETÊNCIAS -->
                    <fieldset class="border p-3 mb-4">
                        <legend class="w-auto">🎯 Competências e Habilidades</legend>
                        
                        <div id="containerCompetencias">
                            <div class="competencia-item mb-2">
                                <input type="text" class="form-control competencia-input" 
                                       name="competencias[]" placeholder="Ex: JavaScript, PHP">
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="adicionarCompetencia()">
                            + Adicionar Competência
                        </button>
                    </fieldset>

                    <!-- SEÇÃO 5: REFERÊNCIAS -->
                    <fieldset class="border p-3 mb-4">
                        <legend class="w-auto">📞 Referências Profissionais</legend>
                        
                        <div id="containerReferencias">
                            <div class="referencia-item mb-3 p-3 border rounded">
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" class="form-control ref-nome" 
                                           name="ref_nome[]" placeholder="Nome completo">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cargo/Função</label>
                                        <input type="text" class="form-control ref-cargo" 
                                               name="ref_cargo[]" placeholder="Ex: Gerente de Projetos">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Telefone</label>
                                        <input type="tel" class="form-control ref-telefone" 
                                               name="ref_telefone[]" placeholder="(11) 99999-9999">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control ref-email" 
                                           name="ref_email[]" placeholder="email@exemplo.com">
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="adicionarReferencia()">
                            + Adicionar Referência
                        </button>
                    </fieldset>

                    <!-- BOTÕES DE AÇÃO -->
                    <div class="d-flex gap-2 mb-5">
                        <button type="submit" class="btn btn-success btn-lg">
                            📥 Gerar Currículo
                        </button>
                        <button type="reset" class="btn btn-secondary btn-lg">
                            🔄 Limpar Formulário
                        </button>
                    </div>
                </form>
            </div>

            <!-- SIDEBAR COM INSTRUÇÕES -->
            <div class="col-md-4">
                <div class="card sticky-top">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">ℹ️ Instruções</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>✅ Preencha os campos obrigatórios (*)</li>
                            <li>✅ Adicione suas formações, experiências e referências</li>
                            <li>✅ Clique em "Gerar Currículo"</li>
                            <li>✅ Visualize e imprima seu currículo</li>
                            <li>✅ Use Ctrl+P ou o botão de imprimir</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>