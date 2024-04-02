<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CJS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>
    

    <div class="barra-lateral">
        <div>
            <a href="perfil_docente.php">
                <div class="nombre-pagina">
                    <img src="../Imagenes/logo (2).png" alt="" width="40%">
                </div>
            </a>  
        </div>

        <nav class="navegacion">
        <ul>
                <li>
                    <a id="inbox" href="perfil_docente.php">
                        <ion-icon name="mail-unread-outline"></ion-icon>
                        <span>Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="Asignaturas.php">
                        <ion-icon name="star-outline"></ion-icon>
                        <span>Asignaturas</span>
                    </a>
                </li>
                <li>
                    <a href="Cursos.php">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Cursos</span>
                    </a>
                </li>
                <br>
                    <h4>Planillas</h4>
                    <br>
                <li>
                    <a href="Asistencias.php">
                        <ion-icon name="paper-plane-outline"></ion-icon>
                        <span>Asistencias</span>
                    </a>
                </li>
                <li>
                    <a href="Notas.php">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Notas</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Modo Oscuro</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo"></div>
                    </div>
                </div>
            </div>
            
    
            <div class="usuario">
                <img src="../Imagenes/profile.jpg" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"><?php echo $nombreUsuario?></span>
                        <span class="email"><?php echo $correoUsuario?></span>
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>

    <main>
        <h1>Asistencia</h1>
        <span class="nav_image">
            <img src="../Imagenes/profile.jpg" logo_img" width="10%" />
        </span>
        <div class="container">
            <table>
                <thead>
                    <tr id="fechas">
                        <td colspan="3">FECHA:</td>
                        <td><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="today" /></td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>APELLIDOS</th>
                        <th>NOMBRES</th>
                        <th>ASISTENCIA</th>
                    </tr>
                </thead>
                <tbody>
                <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        #searchInput {
            width: 40;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 5px;
        }
        #nameList {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #nameList li {
            padding: 5px;
            border-bottom: 1px solid #ccc;
        }
        #nameList li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    
    <input type="text" id="searchInput" placeholder="Buscar nombres...">
    <ul id="nameList">
        <li>Nombre 1</li>
        <li>santy</li>
        <li>Nombre 3</li>
        <!-- Agrega más nombres según sea necesario -->
    </ul>

    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var input, filter, ul, li, name, i;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("nameList");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                name = li[i].textContent;
                if (name.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        });
    </script>
                    <tr>
                        <td>01</td>
                        <td>Mendez</td>
                        <td>santiago</td>
                        <td>
                            <form id="registro-asistencia">
                                <label><input type="radio" name="asistencia" value="asistio"> Asistió</label>
                                <label><input type="radio" name="asistencia" value="no-asistio"> No Asistió</label>
                                <label><input type="radio" name="asistencia" value="excusa"> Excusa</label><br><br>
                                <label for="excusa-archivo">Subir archivo de excusa (docx):</label>
                                <input type="file" id="excusa-archivo" name="excusa-archivo" accept=".docx"><br><br>
                                <button type="submit">Guardar</button>
                            </form>
                            <div id="resultado"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Mendez</td>
                        <td>Carlos</td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Mendez</td>
                        <td>Luciano</td>
                        <td>
                            <select name="" id="">
                                <option value="">ASISTE</option>
                                <option value="">FALLA</option>
                                <option value="">F. JUSTIFICADA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>Mendez</td>
                        <td>Pepe</td>
                        <td>
                            <select name="" id="">
                                <option value="">ASISTE</option>
                                <option value="">FALLA</option>
                                <option value="">F. JUSTIFICADA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>Mendez</td>
                        <td>Juan david</td>
                        <td>
                            <select name="" id="">
                                <option value="">ASISTE</option>
                                <option value="">FALLA</option>
                                <option value="">F. JUSTIFICADA</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td>Mendez</td>
                        <td>Carlos</td>
                        <td>
                            <select name="" id="">
                                <option value="">ASISTE</option>
                                <option value="">FALLA</option>
                                <option value="">F. JUSTIFICADA</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        document.getElementById("registro-asistencia").addEventListener("submit", function(event) {
            event.preventDefault();
            var nombre = document.getElementById("nombre").value;
            var seleccion = document.querySelector('input[name="asistencia"]:checked');
            var excusaArchivo = document.getElementById("excusa-archivo").files[0];
            if (nombre && seleccion) {
                var resultadoDiv = document.getElementById("resultado");
                var mensaje = "Se ha registrado la asistencia de " + nombre + ": " + seleccion.value;
                if (seleccion.value === "excusa" && excusaArchivo) {
                    mensaje += " con archivo de excusa: " + excusaArchivo.name;
                }
                resultadoDiv.textContent = mensaje;
            } else {
                alert("Por favor ingrese el nombre del estudiante y seleccione una opción de asistencia.");
            }
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>