<div id="suchfeld" class="col-lg-6">
  <form action="/home/" method="get">
    <div class="input-group">
        <input name="w" type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
            </span>
    </div>
  </form>
    <!--<select id="dropdown-liste" >
        <?php foreach ($kategorien as $kategorie): ?>
        <option value=<?= $kategorie->kategorie;?>><?= $kategorie->kategorie;?></option>
        <?php endforeach ?>
    </select>-->
</div>
<a href="/home/?o=b" id="kategorie-button" type="button" class="btn btn-success">Beliebteste</a>
<a href="/home/?o=a" id="kategorie-button" type="button" class="btn btn-success">Älteste</a>
<a href="/home/?o=n" id="kategorie-button" type="button" class="btn btn-success">Neuste</a>
<div id="inhalt" class="container-fluid">
    <div>
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
                    <a href="home/rezeptAnzeigen?id=<?=$rezept->id;?>" id="anzeige-button" type="button" class="btn btn-success">Anzeigen</a>
                </div>
            </p>

		<?php endforeach ?>
	<?php endif ?>
</div>
