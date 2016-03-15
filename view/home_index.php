<div id="suchfeld" class="col-lg-6">
  <form action="/home/" method="get">
    <div class="input-group">
        <input name="w" type="text" class="form-control" placeholder="Suchen...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
            </span>
    </div>
  </form>
  <form  action="/home/" method="get">
    <select name="k" id="dropdown-liste" class="form-control" onchange="this.form.submit()">
    <option selected="selected"></option>
        <?php foreach ($kategorien as $kategorie): ?>
        <option <?php echo ($_GET['k'] ==  $kategorie->kategorie) ? 'selected' : '' ;?>><?= $kategorie->kategorie;?></option>
        <?php endforeach ?>
    </select>
    </select>
  </form>
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
                    <a href="/home/rezeptAnzeigen?id=<?=$rezept->id;?>" id="anzeige-button" type="button" class="btn btn-success">Anzeigen</a>
                </div>
            </p>

		<?php endforeach ?>
	<?php endif ?>
</div>
