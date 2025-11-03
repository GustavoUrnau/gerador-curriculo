```javascript
// Calcular idade automaticamente
function calcularIdade() {
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
    
    `;
    container.appendChild(novoItem);
}

// Adicionar Experiência
function adicionarExperiencia() {
    const container = document.getElementById('containerExperiencia');
    const novoItem = document.createElement('div');
    novoItem.className = 'experiencia-item mb-3 p-3 border rounded';
    novoItem.innerHTML = `
    
    `;
    container.appendChild(novoItem);
}

// Adicionar Competência
function adicionarCompetencia() {
    const container = document.getElementById('containerCompetencias');
    const novoItem = document.createElement('div');
    novoItem.className = 'competencia-item mb-2';
    novoItem.innerHTML = `
    
    `;
    container.appendChild(novoItem);
}

// Adicionar Referência
function adicionarReferencia() {
    const container = document.getElementById('containerReferencias');
    const novoItem = document.createElement('div');
    novoItem.className = 'referencia-item mb-3 p-3 border rounded';
    novoItem.innerHTML = `

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
```