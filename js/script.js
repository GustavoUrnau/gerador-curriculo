function calcularIdade()
 {
    const dataNascimento = document.getElementById('data_nascimento').value;
    
    if (dataNascimento) {
        const data = new Date(dataNascimento);
        const hoje = new Date();
        let idade = hoje.getFullYear() - data.getFullYear();
        const mes = hoje.getMonth() - data.getMonth();
        
        if (mes < 0 || (mes === 0 && hoje.getDate() < data.getDate())) {
            idade--;
        }
        
        document.getElementById('idade').value = idade;
    }
}

// Adicionar Formação
function adicionarFormacao() {
    const container = document.getElementById('containerFormacao');
    const novoItem = document.createElement('div');
    novoItem.className = 'formacao-item mb-3 p-3 border rounded';
    novoItem.innerHTML = `
        <div class="mb-3">
            <label class="form-label">Instituição</label>
            <input type="text" class="form-control formacao-instituicao" name="formacao_instituicao[]" placeholder="Ex: Universidade X">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Curso</label>
                <input type="text" class="form-control formacao-curso" name="formacao_curso[]" placeholder="Ex: Engenharia de Software">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Ano de Conclusão</label>
                <input type="number" class="form-control formacao-ano" name="formacao_ano[]" placeholder="2023">
            </div>
        </div>
        <button type="button" class="btn btn-danger btn-sm" onclick="removerItem(this)">🗑️ Remover</button>
    `;
    container.appendChild(novoItem);
}

// Adicionar Experiência
function adicionarExperiencia() {
    const container = document.getElementById('containerExperiencia');
    const novoItem = document.createElement('div');
    novoItem.className = 'experiencia-item mb-3 p-3 border rounded';
    novoItem.innerHTML = `
        <div class="mb-3">
            <label class="form-label">Empresa</label>
            <input type="text" class="form-control exp-empresa" name="exp_empresa[]" placeholder="Nome da empresa">
        </div>
        <div class="mb-3">
            <label class="form-label">Cargo</label>
            <input type="text" class="form-control exp-cargo" name="exp_cargo[]" placeholder="Ex: Desenvolvedor Junior">
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
            <textarea class="form-control exp-descricao" name="exp_descricao[]" rows="2" placeholder="Descreva suas atividades..."></textarea>
        </div>
        <button type="button" class="btn btn-danger btn-sm" onclick="removerItem(this)">🗑️ Remover</button>
    `;
    container.appendChild(novoItem);
}

// Adicionar Competência
function adicionarCompetencia() {
    const container = document.getElementById('containerCompetencias');
    const novoItem = document.createElement('div');
    novoItem.className = 'competencia-item mb-2';
    novoItem.innerHTML = `
        <div class="input-group">
            <input type="text" class="form-control competencia-input" name="competencias[]" placeholder="Ex: JavaScript, PHP">
            <button class="btn btn-danger" type="button" onclick="removerItem(this)">✕</button>
        </div>
    `;
    container.appendChild(novoItem);
}

// Adicionar Referência
function adicionarReferencia() {
    const container = document.getElementById('containerReferencias');
    const novoItem = document.createElement('div');
    novoItem.className = 'referencia-item mb-3 p-3 border rounded';
    novoItem.innerHTML = `
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control ref-nome" name="ref_nome[]" placeholder="Nome completo">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Cargo/Função</label>
                <input type="text" class="form-control ref-cargo" name="ref_cargo[]" placeholder="Ex: Gerente de Projetos">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Telefone</label>
                <input type="tel" class="form-control ref-telefone" name="ref_telefone[]" placeholder="(11) 99999-9999">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control ref-email" name="ref_email[]" placeholder="email@exemplo.com">
        </div>
        <button type="button" class="btn btn-danger btn-sm" onclick="removerItem(this)">🗑️ Remover</button>
    `;
    container.appendChild(novoItem);
}

// Remover item
function removerItem(button) {
    button.closest('.formacao-item, .experiencia-item, .referencia-item, .competencia-item').remove();
}

// Validar formulário
document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formCurriculo');
    if (formulario) {
        formulario.addEventListener('submit', function(e) {
            if (!this.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            this.classList.add('was-validated');
        });
    }
});
