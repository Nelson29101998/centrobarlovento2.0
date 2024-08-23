<table id="tablaBarlovento">
    <thead>
        <tr style="background-color: #F71806;">
            <th style="border: 1px solid black;">Participante</th>
            <?php
            if (!empty($_GET['buscarPartc'])) {
            ?>
                <th style="border: 1px solid black;">Taller</th>
                <th style="border: 1px solid black;">Fecha</th>
            <?php
            }

            $month = date("n"); //Reemplazable por número del 1 a 12
            $year = date("Y"); //Reemplazable por un año valido
            switch (date('n', mktime(0, 0, 0, $month, 1, $year))) {
                case 1:
                    $MesAhora = "Enero";
                    break;
                case 2:
                    $MesAhora = "Febrero";
                    break;
                case 3:
                    $MesAhora = "Marzo";
                    break;
                case 4:
                    $MesAhora = "Abril";
                    break;
                case 5:
                    $MesAhora = "Mayo";
                    break;
                case 6:
                    $MesAhora = "Junio";
                    break;
                case 7:
                    $MesAhora = "Julio";
                    break;
                case 8:
                    $MesAhora = "Agosto";
                    break;
                case 9:
                    $MesAhora = "Septiembre";
                    break;
                case 10:
                    $MesAhora = "Octubre";
                    break;
                case 11:
                    $MesAhora = "Noviembre";
                    break;
                case 12:
                    $MesAhora = "Diciembre";
                    break;
            };
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $resultados = mysqli_query($conexion, $revisarSQL);
        if (mysqli_num_rows($resultados) > 0) {
            while ($row = mysqli_fetch_array($resultados)) {
                $numAsistencia = 0;
                $numInasistencia = 0;
        ?>
                <?php
                $idTiempo = $row['idTallerTiempo'];
                $sacarEstudiante = $row['estudiante'];
                $sacarRut = $row['rut'];
                $sacarCurso =  $row['cursos'];
                echo "<tr style='background-color: #F71806; border: 3px solid black;' class='despues'>
                                    <th>
                                    " . $sacarEstudiante . "
                                    </th>";
                $buscarTiempoTaller = "SELECT * FROM tallertiempo 
                    WHERE idTallerTiempo='" . $idTiempo . "' AND estudiante='" . $sacarEstudiante . "' AND taller='" . $sacarCurso . "'";
                $resultadosTiempo = mysqli_query($conexion, $buscarTiempoTaller);
                if (mysqli_num_rows($resultadosTiempo) > 0) {
                    while ($rowTiempo = mysqli_fetch_array($resultadosTiempo)) {
                        $cajaIdTiempo = $rowTiempo['idTallerTiempo'];
                        $cajaEstdTiempo = $rowTiempo['estudiante'];
                        $cajaMes = $rowTiempo['mes'];
                        $cajaAno = $rowTiempo['ano'];

                        if (!empty($_GET['buscarPartc'])) {
                            echo "<th class='text-center'>" . $row['cursos'] . "</th>";
                            echo "<th class='text-center'>" . $rowTiempo['mes'] . "<br>" . $rowTiempo['ano'] . "</th>";
                        }

                        echo "<th class='text-center'>
                        <p id='asTop'>Días:</p>
                        <p id='asTop'><i class='fa-solid fa-check'></i></p>
                        <p id='inasTop'><i class='fa-solid fa-xmark'></i></p>
                        <!-- <p id='nadaTop'><i class='fa-solid fa-genderless'></i></p> -->
                        </th>
                        <form id='formDia' name='formDia' onsubmit='return true' method='post'
                        action='subirSQL/actualizarDiaSql.php?cajaIdTiempo=" . $cajaIdTiempo . "&cajaEstdTiempo=" . $cajaEstdTiempo . "&cajaTaller=" . $sacarCurso . "&cajaMes=" . $cajaMes . "&cajaAno=" . $cajaAno . "'>";
                        //subirSQL/anadirEstd.php
                        for ($i = 1; $i <= 31; $i++) {
                            $numString = strval($i);
                            echo "<th>
                                <div class='text-center'>
                                <p>" . $i;

                            $nomComp = $rowTiempo['id'];
                            echo "</p>
                            <p>";
                            if ($rowTiempo[$numString] == 0 || $rowTiempo[$numString] == null) {
                                echo "<input onclick='quitarUnoRadio" . $i . $nomComp . "()' form='formDia' type='radio' name='dias" . $i . "' id='dias" . $i . $nomComp . "Uno' value='1'>";
                            } else if ($rowTiempo[$numString] == 1) {
                                echo "<input onclick='quitarUnoRadio" . $i . $nomComp . "()' form='formDia' type='radio' name='dias" . $i . "' id='dias" . $i . $nomComp . "Uno' value='1' checked>";
                                $numAsistencia = $numAsistencia + 1;
                            }
                            echo "</p>
                            <p>";
                            if ($rowTiempo[$numString] == 1 || $rowTiempo[$numString] == null) {
                                echo "<input onclick='quitarUnoRadio" . $i . $nomComp . "()' form='formDia' type='radio' name='dias" . $i . "' id='dias" . $i . $nomComp . "Dos' value='0'>";
                            } else if ($rowTiempo[$numString] == 0) {
                                echo "<input onclick='quitarUnoRadio" . $i . $nomComp . "()' form='formDia' type='radio' name='dias" . $i . "' id='dias" . $i . $nomComp . "Dos' value='0' checked>";
                                $numInasistencia = $numInasistencia + 1;
                            }

                            echo "</p>";
                            $numerosDias = (string) "dias" . $i;
                            if (($rowTiempo[$numString] != 1) || ($rowTiempo[$numString] != 0)) {
                                $_SESSION[$numerosDias] = "vacio";
                            }
                            echo "
                            </div>
                                </th>
                                <script>
                                    function quitarUnoRadio" . $i . $nomComp . "() {
                                        var radioUno = $('#dias" . $i . $nomComp . "Uno');
                                        var verValueUno = $('input[id=\'dias" . $i . $nomComp . "Uno\']:checked').val();
                                        var verBoolUno = $('input[id=\'dias" . $i . $nomComp . "Uno\']:checked').data('waschecked');
                                        //console.log(verValueUno + ' ' + verBoolUno);
                                        
                                        var radioDos = $('#dias" . $i . $nomComp . "Dos');
                                        var verValueDos = $('input[id=\'dias" . $i . $nomComp . "Dos\']:checked').val();
                                        var verBoolDos = $('input[id=\'dias" . $i . $nomComp . "Dos\']:checked').data('waschecked');
                                        //console.log(verValueDos + ' ' + verBoolDos);

                                        if(verValueUno == '1') {
                                            if(verBoolUno == true) {
                                                radioUno.prop('checked', false);
                                                radioUno.data('waschecked', false);
                                                return;
                                            }
                                            radioUno.data('waschecked', true);
                                            return;  
                                        }
                                        
                                        if(verValueDos == '0') {
                                            if(verBoolDos == true) {
                                                radioDos.prop('checked', false);
                                                radioDos.data('waschecked', false);
                                                return;
                                            }
                                            radioDos.data('waschecked', true);
                                            return;
                                        }

                                    }
                                </script>
                                ";
                        }
                        echo "<th>
                                    <p>
                                        <button type='submit' id='guardarIdDia' class='btn btn-success btn-sm'>
                                            <i class='fas fa-floppy-disk fa-xl'></i>
                                        </button> 
                                    </p>";
                        if (!empty($_GET['buscarPartc'])) {
                            echo "<p>
                                        <a href='subirSQL/anadirMes.php?cajaIdTiempo=" . $cajaIdTiempo . "&cajaEstdTiempo=" . $cajaEstdTiempo . "&cajaTaller=" . $sacarCurso . "&cajaMes=" . $cajaMes . "&cajaAno=" . $cajaAno . "'>
                                            <button type='button' id='anadirMes' class='btn btn-info'>
                                                <i class='fa-solid fa-calendar-plus fa-xl'></i>
                                            </button> 
                                        </a>                                        
                                    </p>";
                        }
                        echo "</th>
                                <th>
                                    <p>
                                        <a href='pdfAsist.php?nomEst=" . $sacarEstudiante . "&rut=" . $sacarRut . "&taller=" . $sacarCurso . "&numAst=" . $numAsistencia . "&numIna=" . $numInasistencia . "&revMes=" . $cajaMes . "&revAno=" . $cajaAno . "' target='_blank'>
                                            <button type='button' id='pdfId' class='btn btn-info'>
                                                <i class='fa-solid fa-file-pdf fa-2xl'></i>
                                            </button>
                                        </a>
                                    </p>

                                    <p>
                                        <a href='subirSQL/borrarAsist.php?borrarId=" . $row['id'] . "&borrarTiempoId=" . $row['idTallerTiempo'] . "&borrarNom=" . $row['estudiante'] . "&borrarTaller=" . $row['cursos'] . "'>                                   
                                            <button type='button' id='borrarId' class='btn btn-danger'>
                                                <i class='fas fa-trash-can fa-2xl'></i>
                                            </button>
                                        </a>
                                    </p>
                                </th>
                                </form>";
                    }
                }
                $totalAsistencias = $numAsistencia + $numInasistencia;
                echo "</tr>
                    <tr style='background-color: #F71806;' class='despues'>
                        <th class='text-center' colspan='38'>                    
                            Asistencia: " . $numAsistencia . " / Inasistencia: " . $numInasistencia . " / Total: " . $totalAsistencias . "                    
                        </th>
                    </tr>
                    <br>";
                ?>
        <?php
            }
        } else {
            echo "<tr style='background-color: #F71806;'>
                            <th class='text-center' colspan='36'>
                            <i class='fas fa-folder-open '></i> No hay lista de estudiande
                            </th>
                            </tr>";
        }
        mysqli_free_result($resultados);
        ?>
    </tbody>
</table>