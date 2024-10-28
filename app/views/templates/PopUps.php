<!-- ELECCION DE FICHA -->
<div id="popupFicha">
    <div class="popup-content">
        <p>¿Quieres ver la ficha básica o la ficha general?</p>
        <button id="fichaBasicaBtn">Ficha Básica</button>
        <button id="fichaGeneralBtn">Ficha General</button>
        <button id="closePopup">Cerrar</button>
    </div>
</div>

<!-- VER REGISTRO DE MOVIMIENTOS FICHA -->
<div id="popupMovimentsFicha">
    <div class="popup-content">
    <?php if (!empty($moviments)): ?>
        <table>
            <tr>
                <th>Museu Procedencia</th>
                <th>Museu Actual</th>
                <th>Data Inici</th>
                <th>Data Fi</th>
            </tr>
            <?php foreach ($moviments as $moviment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($moviment['Museu_Procedencia']); ?></td>
                    <td><?php echo htmlspecialchars($moviment['Museu_Actual']); ?></td>
                    <td><?php echo htmlspecialchars($moviment['Data_Inici']); ?></td>
                    <td><?php echo htmlspecialchars($moviment['Data_Fi']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No s'han trobat moviments relacionats amb aquesta obra</p>
    <?php endif; ?>

        <button id="closePopupMovimentsFicha">Cerrar</button>
    </div>
</div>

<!-- VER RESTAURACIONES FICHA -->
<div id="popupRestauraciones">
    <div class="popup-content">
    <?php if (!empty($restauracions)): ?>
        <table>
            <tr>
                <th>Data inici</th>
                <th>Data fi</th>
                <th>Comentari</th>
                <th>Restaurador</th>
            </tr>
            <?php foreach ($restauracions as $restauracio): ?>
                <tr>
                    <td><?php echo htmlspecialchars($restauracio['data_inici']); ?></td>
                    <td><?php echo htmlspecialchars($restauracio['data_fi']); ?></td>
                    <td><?php echo htmlspecialchars($restauracio['comentari']); ?></td>
                    <td><?php echo htmlspecialchars($restauracio['nom_restaurador']); ?></td>  
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No s'han trobat restauracions relacionades amb aquesta obra</p>
    <?php endif; ?>
        <button id="closePopupRestauraciones">Cerrar</button>
    </div>
</div>

<!-- VER EXPOSICIONES FICHA -->
<div id="popupExposiciones">
    <div class="popup-content">
    <?php if (!empty($exposicions)): ?>
        <table>
            <tr>
                <th>Nom Exposicio</th>
                <th>Data Inici</th>
                <th>Data Fi</th>
                <th>Tipus Expo</th>
                <th>Lloc Exposicio</th>
                <th></th>
            </tr>
            <?php foreach ($exposicions as $exposicio): ?>
                <tr>
                    <td><?php echo htmlspecialchars($exposicio['Nom_Expo']); ?></td>
                    <td><?php echo htmlspecialchars($exposicio['Data_Inici_Expo']); ?></td>
                    <td><?php echo htmlspecialchars($exposicio['Data_Fi_Expo']); ?></td>
                    <td><?php echo htmlspecialchars($exposicio['Tipus_Expo']); ?></td>
                    <td><?php echo htmlspecialchars($exposicio['Lloc_Exposicio']); ?></td>
                    <td><a href="">Veure exposicio</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No s'han trobat exposicions relacionades amb aquesta obra</p>
    <?php endif; ?>
        <button id="closePopupExposiciones">Cerrar</button>
    </div>
</div>

<!-- VER BIBLIOGRAFIA FICHA -->
<div id="popupBibliografia">
    <div class="popup-content">
        <p><?php echo $ficha[0]["Bibliografia"]?></p>
        <button id="closePopupBibliografia">Cerrar</button>
    </div>
</div>

<!-- VER DESCRIPCION FICHA -->
<div id="popupDescripcion">
    <div class="popup-content">
        <p><?php echo $ficha[0]["Descripcio"]?></p>
        <button id="closePopupDescripcion">Cerrar</button>
    </div>
</div>

<!-- VER HISTORIA FICHA -->
<div id="popupHistoria">
    <div class="popup-content">
        <p><?php echo $ficha[0]["Historia_Objecte"]?></p>
        <button id="closePopupHistoria">Cerrar</button>
    </div>
</div>