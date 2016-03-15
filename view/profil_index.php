<a href="#popup2" id="auswahl-button" id="neuesRezept-button" type="button" class="btn btn-success">Neues Rezept</a>
<div id="inhalt" class="container-fluid">  
        <?php if (empty($rezepte)): ?>
		    <div class="dhd">
			    <h2 class="item title">Hoopla! Keine Rezepte gefunden.</h2>
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
                    <a id="auswahl-button" name="text" value="<?=$rezept->rezept;?>" href="#popup1<?=$rezept->id;?>" id="anzeige-button" type="button" class="btn btn-success">Anzeigen</a>
                    <a id="auswahl-button" href="profil/rezeptLoeschen?id=<?=$rezept->id;?>" id="löschen-button" type="button" class="btn btn-success">Löschen</a>
                </div>
            </p>
            <div id="popup1<?=$rezept->id;?>" class="overlay">
  	            <div class="popup">
    		        <a class="close" href="#">&times;</a>
                    <div id="popup-titel" >
                        <?=$rezept->titel;?>
                    </div>
                    <FORM ACTION="/Profil/bearbeiten" METHOD="post">
                        <TEXTAREA name="text" COLS=40 ROWS=6 style="margin: 0px; height: 520px; width: 793px;">
                            <?=$rezept->rezept;?>
                        </TEXTAREA>
                        <P><INPUT type="hidden" name="id" value="<?=$rezept->id;?>">
                        <INPUT TYPE="submit" VALUE="speichern">
                    </FORM>
	            </div>
            </div>
		<?php endforeach ?>
	<?php endif ?>   
</div>

<div id="popup2" class="overlay">
  	<div class="popup">       
		    <a class="close" href="#">&times;</a>
			     <FORM ACTION="/Profil/neu" METHOD="post">
                    <select name="dropDown" id="dropdown-liste" >
                        <?php foreach ($kategorien as $kategorie): ?>
                            <option value=<?= $kategorie->id;?>><?= $kategorie->kategorie;?></option>
                        <?php endforeach ?>
                    </select>
                    <input id="titel" name="titel">
                    <TEXTAREA name="text" COLS=40 ROWS=6 style="margin: 0px; height: 520px; width: 793px;">
                    </TEXTAREA>
                    <P><INPUT TYPE="submit" VALUE="submit">
                 </FORM>
	  </div>
</div>