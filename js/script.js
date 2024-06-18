// LÓGICA DO ALERT

document.querySelectorAll('.close-btn').forEach(button => {
    button.addEventListener('click', function() {
        this.closest('.alert, .alert-ruim').style.display = 'none';
    });
});


// LÓGICA DE AUTO COMPLETAR CARACTERES DATA DE NASCIMENTO

document.getElementById('dataNascimento').addEventListener('input', function (event) {
    var input = event.target;
    var value = input.value.replace(/\D/g, '');
    if (value.length > 2) {
        value = value.slice(0, 2) + '/' + value.slice(2);
    }
    if (value.length > 5) {
        value = value.slice(0, 5) + '/' + value.slice(5);
    }
    input.value = value;
});

// LÓGICA DE AUTO COMPLETAR CARACTERES DO CPF

document.getElementById('cpf').addEventListener('input', function (event) {
    var input = event.target;
    var value = input.value.replace(/\D/g, '');
    if (value.length > 3) {
        value = value.slice(0, 3) + '.' + value.slice(3);
    }
    if (value.length > 7) {
        value = value.slice(0, 7) + '.' + value.slice(7);
    }
    if (value.length > 11) {
        value = value.slice(0, 11) + '-' + value.slice(11);
    }
    input.value = value;
});

// LÓGICA DE AUTO COMPLETAR CARACTERES DO RG

document.getElementById('rg').addEventListener('input', function (event) {
    var input = event.target;

    var value = input.value;

    var lastChar = value.slice(-1);
    if (value.length >= 11) {
        if (/\D/.test(lastChar) && /[a-zA-Z]/.test(lastChar)) {
            value = value.slice(0, -1).replace(/\D/g, '') + lastChar;
        } else {
            value = value.replace(/\D/g, '');
        }
    } else {
        var value = input.value.replace(/\D/g, '');
    }

    if (value.length > 2) {
        value = value.slice(0, 2) + '.' + value.slice(2);
    }
    if (value.length > 6) {
        value = value.slice(0, 6) + '.' + value.slice(6);
    }
    if (value.length > 10) {
        value = value.slice(0, 10) + '-' + value.slice(10);
    }
    input.value = value;
});

// LÓGICA DE AUTO COMPLETAR CARACTERES DO CEP

document.getElementById('cep').addEventListener('input', function (event) {
    var input = event.target;
    var value = input.value.replace(/\D/g, '');
    if (value.length > 5) {
        value = value.slice(0, 5) + '-' + value.slice(5);
    }
    input.value = value;
});

// LÓGICA DE AUTO COMPLETAR CARACTERES DO TELEFONE

document.getElementById('tel').addEventListener('input', function (event) {
    var input = event.target;
    var value = input.value.replace(/\D/g, '');
    if (value.length > 0) {
        value = value.slice(0, 0) + '(' + value.slice(0);
    }

    if (value.length > 3) {
        value = value.slice(0, 3) + ')' + value.slice(3);
    }

    if (value.length > 10) {
        value = value.slice(0, 10) + '-' + value.slice(10);
    }

    input.value = value;
});