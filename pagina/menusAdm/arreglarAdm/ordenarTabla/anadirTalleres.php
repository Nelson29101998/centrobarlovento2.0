<form id='formAddAlumno' name='formAddAlumno' onsubmit='return creaAlumno()' method='post' action='subirSQL/anadirEstd.php'>
    <table style="background-color: #F71806; border-radius: 15px;">
        <tbody>
            <tr>
                <th colspan="2">
                    <label for="cadaEstudiante" class="text-white">
                        <h5 style="width: 450px;">
                            <i class="fas fa-user"></i>
                            Elige cada Participante (que ya lo tiene participante anterior) para anadir al taller:
                        </h5>
                    </label>
                </th>
            </tr>
            <?php
            include_once "selecciones/estdSelect.php";
            ?>
            <tr>
                <th>
                    <label for="verCurso" class="text-white">
                        <h5>
                            <i class="fa-solid fa-chalkboard"></i> Elegir al Taller:
                        </h5>
                    </label>
                    <select name="verCurso" id="verCurso" class="form-select">
                        <?php
                        include_once "selecciones/cursosSelect.php";
                        ?>
                    </select>
                </th>
                <th class="text-center">
                    <label class="col-auto">
                        Es hoy: <i class="fa-solid fa-square fa-2xl" style="color: #33cc33;"></i>
                    </label>
                </th>
            </tr>
            <tr>
                <th>
                    <label for="elegirMes" class="text-white">
                        <h5>
                            <i class="fa-regular fa-calendar"></i> Elige un mes:
                        </h5>
                    </label>
                    <select name="elegirMes" id="elegirMes" class="form-select">
                        <?php
                        include_once "selecciones/elegirMes2.php";
                        ?>
                    </select>
                </th>

                <th>
                    <label for="elegirAno" class="text-white">
                        <h5>
                            <i class="fa-regular fa-calendar"></i> Elige un Ano:
                        </h5>
                    </label>
                    <select name="elegirAno" id="elegirAno" class="form-select">
                        <?php
                        include_once "selecciones/elegirAno2.php";
                        ?>
                    </select>
                </th>
            </tr>
            <tr>
                <th colspan="2" class="text-center">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-user-plus"></i> Añadir a la asistencia de participante
                    </button>
                </th>
            </tr>
        </tbody>
    </table>
</form>