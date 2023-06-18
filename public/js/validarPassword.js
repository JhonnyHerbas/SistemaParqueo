function checkPasswordMatch(input) {
    const password = document.getElementById('validationCustom07').value;
    const confirmPassword = input.value;

    if (password === confirmPassword) {
        input.setCustomValidity('');
        document.getElementById('password-match-msg').textContent = 'Contraseñas iguales ✔';
    } else {
        input.setCustomValidity('Las contraseñas no coinciden');
        document.getElementById('password-match-msg').textContent = 'Las contraseñas no coinciden';
    }
}