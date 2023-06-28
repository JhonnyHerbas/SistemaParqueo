const textarea = document.getElementById('validationTextarea');

textarea.addEventListener('input', function () {
    const value = this.value;
    const pattern = /^(?=.*[a-zA-ZáéíóúÁÉÍÓÚüÜ])[a-zA-ZáéíóúÁÉÍÓÚüÜ0-9\s.,:;-]+$/;

    if (!pattern.test(value)) {
        this.setCustomValidity('Ingresa solo letras, números, espacios y puntos.');
    } else {
        this.setCustomValidity('');
    }
});