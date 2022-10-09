$('#div-eye').on('click', () => {
    let input = document.getElementById('tx_senha');
    let olho = document.getElementById('eye');
    if (input.type === 'text') {
        input.type = 'password';
        olho.className = "fas fa-eye";
    } else {
        input.type = 'text';
        olho.className = "fas fa-eye-slash";
    }
});

$('#logar').submit((e) => {
    e.preventDefault();

    let $form = $(this),
        data = $(this).serializeArray(),
        formData = new FormData();
    
    $.each(data, (item, val) => {
        formData.append(val.name, val.value);
    });

    $.ajax({
        url: $form.attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);
        }
    })
});