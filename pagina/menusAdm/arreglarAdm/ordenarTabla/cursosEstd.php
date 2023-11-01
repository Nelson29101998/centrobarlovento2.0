<table>
    <thead>
        <tr>
            <th>
                <h5>Cursos a los cuales se inscribe</h5>
            </th>
            <th class="text-center">
                <label class="col-auto">
                    Es hoy: <i class="fa-solid fa-square fa-2xl" style="color: #33cc33;"></i>
                </label>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th class="form-group">
                <label for="sacarCurso1" class="text-white">
                    <i class="fa-solid fa-chalkboard-user"></i> Curso 1:
                </label>
                <label class="col-auto">
                    <select name="sacarCurso1" id="sacarCurso1" class="form-select">
                        <?php
                        include_once "selecciones/sacarCursosSelect.php";
                        ?>
                    </select>
                </label>
            </th>
        </tr>
        <tr>
            <th class="form-group">
                <label for="sacarCurso2" class="text-white">
                    <i class="fa-solid fa-chalkboard-user"></i> Curso 2:
                </label>
                <label class="col-auto">
                    <select name="sacarCurso2" id="sacarCurso2" class="form-select">
                        <?php
                        include_once "selecciones/sacarCursosSelect2.php";
                        ?>
                    </select>
                </label>
            </th>
            <th class="form-group">
                (<i class="fa-solid fa-asterisk fa-2xs"></i><i class="fa-solid fa-asterisk fa-2xs"></i>)
            </th>
        </tr>
        <tr>
            <th class="form-group">
                <label for="sacarCurso3" class="text-white">
                    <i class="fa-solid fa-chalkboard-user"></i> Curso 3:
                </label>
                <label class="col-auto">
                    <select name="sacarCurso3" id="sacarCurso3" class="form-select">
                        <?php
                        include_once "selecciones/sacarCursosSelect3.php";
                        ?>
                    </select>
                </label>
            </th>
            <th class="form-group">
                (<i class="fa-solid fa-asterisk fa-2xs"></i><i class="fa-solid fa-asterisk fa-2xs"></i>)
            </th>
        </tr>
        <tr>
            <th class="form-group">
                <label for="sacarCurso4" class="text-white">
                    <i class="fa-solid fa-chalkboard-user"></i> Curso 4:
                </label>
                <label class="col-auto">
                    <select name="sacarCurso4" id="sacarCurso4" class="form-select">
                        <?php
                        include_once "selecciones/sacarCursosSelect4.php";
                        ?>
                    </select>
                </label>
            </th>
            <th class="form-group">
                (<i class="fa-solid fa-asterisk fa-2xs"></i><i class="fa-solid fa-asterisk fa-2xs"></i>)
            </th>
        </tr>
        <tr>
            <th class="form-group">
                <label for="sacarCurso5" class="text-white">
                    <i class="fa-solid fa-chalkboard-user"></i> Curso 5:
                </label>
                <label class="col-auto">
                    <select name="sacarCurso5" id="sacarCurso5" class="form-select">
                        <?php
                        include_once "selecciones/sacarCursosSelect5.php";
                        ?>
                    </select>
                </label>
            </th>
            <th class="form-group">
                (<i class="fa-solid fa-asterisk fa-2xs"></i><i class="fa-solid fa-asterisk fa-2xs"></i>)
            </th>
        </tr>
        <tr>
            <th>
                <label for="elegirMes" class="text-white">
                    <i class="fa-regular fa-calendar"></i> Elige un mes:
                </label>
                <select name="elegirMes" id="elegirMes" class="form-select">
                    <?php
                    include_once "selecciones/elegirMes.php";
                    ?>
                </select>
            </th>
            <th>
                <label for="elegirAno" class="text-white">
                    <i class="fa-regular fa-calendar"></i> Elige un Ano:
                </label>
                <select name="elegirAno" id="elegirAno" class="form-select">
                    <?php
                    include_once "selecciones/elegirAno.php";
                    ?>
                </select>
            </th>
        </tr>
    </tbody>
</table>