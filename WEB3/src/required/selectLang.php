<form id="languageForm" method="post">
    <select id="selectHizkuntzaAukeratzeko" name="selectedLang">
        <!-- PHPko logika honekin formularioan zein hizkuntza agertzen den aukeratuta erabakiko dugu -->
        <option value="eus" <?php
                            
                            if (isset($_POST['selectedLang']) && $_POST['selectedLang'] === 'eus') {
                                echo 'selected';
                            } elseif (!isset($_POST['selectedLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'eus') {
                                
                                echo 'selected';
                            }
                            
                            ?>> EUS</option>
        <option value="es" <?php
                            
                            if (isset($_POST['selectedLang']) && $_POST['selectedLang'] === 'es') {
                                echo 'selected';
                            } elseif (!isset($_POST['selectedLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'es') {
                                
                                echo 'selected';
                            }
                            
                            ?>> ES</option>
        <option value="en" <?php
                            if (isset($_POST['selectedLang']) && $_POST['selectedLang'] === 'en') {
                                echo 'selected';
                            } elseif (!isset($_POST['selectedLang']) && isset($_SESSION['_LANGUAGE']) && $_SESSION['_LANGUAGE'] === 'en') {
                                
                                echo 'selected';
                            }
                            
                            ?>> EN</option>
    </select>
    <button id="hizkuntzaBtn"><?= trans("aldatu") ?></button>
</form>




