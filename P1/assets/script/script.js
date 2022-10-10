$('#div-eye').on('click', function() {
    console.log('Clicou');
    let input = document.getElementById('senha');
    let olho = document.getElementById('eye');
    if (input.type === 'text') {
        input.type = 'password';
        olho.className = "fas fa-eye";
    } else {
        input.type = 'text';
        olho.className = "fas fa-eye-slash";
    }
});