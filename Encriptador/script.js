let textoEncriptado = ''; // Variable global para almacenar el texto encriptado

function cifradoCesar(texto, desplazamiento) {
    let textoEncriptado = '';
    for (let i = 0; i < texto.length; i++) {
        let caracter = texto[i];
        if (caracter.match(/[a-z]/i)) {
            let codigoAscii = texto.charCodeAt(i);
            let inicio = (caracter === caracter.toUpperCase()) ? 65 : 97;
            let nuevaPosicion = (codigoAscii - inicio + desplazamiento) % 26 + inicio;
            textoEncriptado += String.fromCharCode(nuevaPosicion);
        } else {
            textoEncriptado += caracter;
        }
    }
    return textoEncriptado;
}

function encriptarTexto() {
    let textoOriginal = document.getElementById("texto").value;
    let desplazamiento = parseInt(document.getElementById("desplazamiento").value);

    if (!isNaN(desplazamiento)) {
        textoEncriptado = cifradoCesar(textoOriginal, desplazamiento);
        document.getElementById("resultado").textContent = "Texto encriptado: " + textoEncriptado;
    } else {
        document.getElementById("resultado").textContent = "Por favor, ingrese un número válido para el desplazamiento.";
    }
}

function desencriptarTexto() {
    let desplazamiento = parseInt(document.getElementById("desplazamiento").value);

    if (!isNaN(desplazamiento)) {
        let textoDesencriptado = cifradoCesar(textoEncriptado, -desplazamiento);
        document.getElementById("resultado").textContent = "Texto desencriptado: " + textoDesencriptado;
    } else {
        document.getElementById("resultado").textContent = "Por favor, ingrese un número válido para el desplazamiento.";
    }
}
