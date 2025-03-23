// Função para validar CPF
function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf.length !== 11 || /^(.)\1+$/.test(cpf)) return false;

    let soma = 0;
    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let resto = soma % 11;
    let digito1 = resto < 2 ? 0 : 11 - resto;

    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = soma % 11;
    let digito2 = resto < 2 ? 0 : 11 - resto;

    return parseInt(cpf.charAt(9)) === digito1 && parseInt(cpf.charAt(10)) === digito2;
}

// Aplica máscara e validação a todos os campos com a classe "cpf-mask"
$(document).ready(function() {
    $('.date-mask').mask('00/00/0000');

    // Aplica a máscara
    $('.cpf-mask').mask('000.000.000-00');

    // Validação ao enviar formulários que contenham o campo CPF
    $('form').on('submit', function(e) {
        const cpfField = $(this).find('.cpf-mask');
        if (cpfField.length) {
            const cpf = cpfField.val();
            const cpfError = $(this).find('#cpf-error'); // ID do elemento de erro

            if (!validarCPF(cpf)) {
                e.preventDefault();
                cpfError.text('CPF inválido!').show();
                return false;
            }
        }
    });

    // Validação em tempo real (opcional)
    $('.cpf-mask').on('blur', function() {
        const cpf = $(this).val();
        const cpfError = $(this).siblings('#cpf-error'); // Ajuste conforme sua estrutura HTML

        if (!validarCPF(cpf)) {
            cpfError.text('CPF inválido!').show();
        } else {
            cpfError.hide();
        }
    });
});
