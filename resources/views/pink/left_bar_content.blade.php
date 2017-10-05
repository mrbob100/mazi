<form action="select1.php" method="post">
    <p> <input type="text" id="amount" /></p>
    <div id="slider2"></div>
    <select name="menuFirms" size="1" id="menuFirms">
        <option disabled>Производитель</option>
        <option value="BOSCH">BOSCH</option>
        <option value="DREMEL">DREMEL</option>
        <option value="BAHCO">BAHCO</option>
        <option value="FELCO">FELCO</option>
        <option value="LOWE">LOWE</option>
        <option value="FISCSRS">FISCSRS</option>
        <option value="SILKY">SILKY</option>
        <option value="ARS">ARS</option>
        <option value="TINA">TINA</option>
    </select>

    <select name="menuCountries" size="1" id="menuCountries">
        <option disabled>Страна производителя</option>
        <option value="Германия">Германия</option>
        <option value="Китай">Китай</option>
        <option value="Малайзия">Малайзия</option>
    </select>

    <select name="menuPower" size="1" id="menuPower">
        <option disabled>Потребляемая мощность</option>
        <option value="170 Вт">170 Вт</option>
        <option value="190 Вт">190 Вт</option>
        <option value="110 Вт">110 Вт</option>
    </select>

    <select name="menuComplect" size="1" id="menuComplect">
        <option disabled>Потребляемая мощность</option>
        <option value="Чемодан">Чемодан</option>
        <option value="Кейс">Кейс</option>
        <option value="Картон">Картон</option>
    </select>

    <input type="checkbox" value="sh" name="dop_oprions" id="shlem_left" />
    <label for="shlem-left">Ударная/безударная</label>
    <p><b>Тип инструмента</b></p>
    <p><input name="dzen" type="radio" value="Электрический">Электрический</p>
    <p><input name="dzen" type="radio" value="Аккумуляторный"> Аккумуляторный</p>
    <p><input name="dzen" type="radio" value="Гидравлический">Гидравлический</p>

    <input type="button" id="button_left" value="отправить" />
</form>