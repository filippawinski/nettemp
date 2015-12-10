<?php
$root=$_SERVER["DOCUMENT_ROOT"];
$db = new PDO("sqlite:$root/dbf/nettemp.db");
$rows = $db->query("SELECT * FROM sensors WHERE minmax='on'");
$result = $rows->fetchAll();
$numRows = count($result);
if ( $numRows > '0' ) { ?>

<div class="grid-item">
<div class="panel panel-default">
<div class="panel-heading">Sensors Min Max</div>

<table class="table table-hover table-condensed">
<tbody>
<tr>
   <th></th>
   <th>Hour</th>
    <th>Day</th>
    <th>Week</th>
    <th>Month</th>
</tr>
<?php
foreach ($result as $a) {

$rom=$a['rom'];
$file=$rom .".sql";


    $db1 = new PDO("sqlite:$root/db/$file");
    $h = $db1->query("select min(value) AS hmin, max(value) AS hmax from def WHERE time BETWEEN datetime('now','-1 hour') AND datetime('now')") or die('hour');
    $h = $h->fetch(); 
    $d = $db1->query("select min(value) AS dmin, max(value) AS dmax from def WHERE time BETWEEN datetime('now','-1 day') AND datetime('now')") or die('day');
    $d = $d->fetch(); 
    $w = $db1->query("select min(value) AS wmin, max(value) AS wmax from def WHERE time BETWEEN datetime('now','-7 day') AND datetime('now')") or die('week');
    $w = $w->fetch(); 
    $m = $db1->query("select min(value) AS mmin, max(value) AS mmax from def WHERE time BETWEEN datetime('now','-1 months') AND datetime('now')") or die('week');
    $m = $m->fetch(); 

    echo "<tr>
	<td>".$a['name'] ."</td>
	<td><span class=\"label label-info\">".$h['hmin']."</span><span class=\"label label-warning\">".$h['hmax']."</span></td>
	<td><span class=\"label label-info\">".$d['dmin']."</span><span class=\"label label-warning\">".$d['dmax']."</span></td>
	<td><span class=\"label label-info\">".$w['wmin']."</span><span class=\"label label-warning\">".$w['wmax']."</span></td>
	<td><span class=\"label label-info\">".$m['mmin']."</span><span class=\"label label-warning\">".$m['mmax']."</span></td>
	</tr>";
}
?>
</tbody>
</table>
</div>
</div>
<?php 
}
?>