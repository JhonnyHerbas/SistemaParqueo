const textarea = document.getElementById('validationTextarea');

textarea.addEventListener('input', function () {
    const value = this.value;
    const pattern = /^(?=.*[a-zA-Z])[a-zA-Z0-9\s.]+$/;

    if (!pattern.test(value)) {
        this.setCustomValidity('Ingresa solo letras, números, espacios y puntos.');
    } else {
        this.setCustomValidity('');
    }
});