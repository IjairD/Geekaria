function scrollCarousel(direction) {
    const carousel = document.querySelector('.carousel');
    const cardWidth = document.querySelector('.card').offsetWidth + 20; // inclui margin
    carousel.scrollBy({
        left: direction * cardWidth,
        behavior: 'smooth'
    });
}

function validaImagem(input) {
    var caminho = input.value;

    if (caminho) {
        var comecoCaminho = (caminho.indexOf('\\') >= 0 ? caminho.lastIndexOf('\\') : caminho.lastIndexOf('/'));
        var nomeArquivo = caminho.substring(comecoCaminho);

        if (nomeArquivo.indexOf('\\') === 0 || nomeArquivo.indexOf('/') === 0) {
            nomeArquivo = nomeArquivo.substring(1);
        }

        var extensaoArquivo = nomeArquivo.indexOf('.') < 1 ? '' : nomeArquivo.split('.').pop();

        if (extensaoArquivo != 'gif' &&
            extensaoArquivo != 'png' &&
            extensaoArquivo != 'jpg' &&
            extensaoArquivo != 'jpeg') {
            input.value = '';
            alert("É preciso selecionar um arquivo de imagem (gif, png, jpg ou jpeg)");
        }
    } else {
        input.value = '';
        alert("Selecione um caminho de arquivo válido");
    }
    if (input.files && input.files[0]) {
        var arquivoTam = input.files[0].size / 1024 / 1024;
        if (arquivoTam < 16) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imagemSelecionada').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            input.value = '';
            alert("O arquivo precisa ser uma imagem com menos de 16 MB");
        }
    } else {
        document.getElementById('imagemSelecionada').setAttribute('src', '#');
    }
}

function mascaraTelefone(event) {
    let tecla = event.key;
    let telefone = event.target.value.replace(/\D+/g, "");

    // Permite apenas números e teclas úteis
    if (!/^[0-9]$/.test(tecla) && !["Backspace", "Delete", "Tab"].includes(tecla)) {
        event.preventDefault();
        return;
    }

    // Impede digitação acima de 11 dígitos
    if (/^[0-9]$/.test(tecla) && telefone.length >= 11) {
        event.preventDefault();
        return;
    }

    // Aguarda inserção da tecla e depois formata
    setTimeout(() => {
        telefone = event.target.value.replace(/\D+/g, "");
        if (telefone.length > 10) {
            telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (telefone.length > 5) {
            telefone = telefone.replace(/^(\d{2})(\d{4})(\d{0,4})/, "($1) $2-$3");
        } else if (telefone.length > 2) {
            telefone = telefone.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
        } else {
            telefone = telefone.replace(/^(\d*)/, "($1");
        }
        event.target.value = telefone;
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const inputCelular = document.getElementById('celular');
    if (inputCelular) {
        inputCelular.addEventListener('keydown', mascaraTelefone);
    }
    const form = document.querySelector('form'); // ou use um id específico do form
    if (form) {
        form.addEventListener('submit', function(event) {
            const senha1 = document.getElementById('password').value;
            const senha2 = document.getElementById('password2').value;
            if (senha1 !== senha2) {
                event.preventDefault();
                alert('As senhas não coincidem!');
            }
        });
}});
