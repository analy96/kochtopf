  <div id="inhalt" class="container-fluid">
        <?php if (empty($rezepte)): ?>
		    <div class="dhd">
			    <h2 class="item title">Hoopla! Keine Kommentare gefunden.</h2>
		    </div>
	    <?php else: ?>
		    <?php foreach ($rezepte as $rezept): ?>
            <p>
                <div id="aussen-zelle" class="container">
			        <div id="innere-zelle" class="container">
                        <table>
                            <tr>
                                <td><?= $rezept->titel;?></td>
                            </tr>
                            <tr>
                                <td><?= $rezept->rezept;?></td> 
                            </tr>
				        </table>
                    </div>
                    <a href="profil/rezeptAnzeigen?id=<?=$rezept->id;?>" id="anzeige-button" type="button" class="btn btn-success">Anzeigen</a>
                    <a href="profil/rezeptLöschen?id=<?=$rezept->id;?>" id="löschen-button" type="button" class="btn btn-success">Löschen</a>
                </div>
            </p>
		<?php endforeach ?>
	<?php endif ?>
</div>