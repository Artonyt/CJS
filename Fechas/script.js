document.getElementById('validar-fecha').addEventListener('click', function() {
    var fechaInicial = new Date(document.getElementById('fecha-inicial').value);
    var fechaFinal = new Date(document.getElementById('fecha-final').value);

    if (fechaFinal < fechaInicial) {
        document.getElementById('mensaje-error').textContent = 'La fecha final no puede ser menor a la fecha inicial.';
    } else {
        document.getElementById('mensaje-error').textContent = '';
        alert('Fechas válidas.');
    }
});
