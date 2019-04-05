<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="css/calendar.css" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div id="contenido">
		<div id="cal">
			<div class="header">
				<span class="left button" id="prev"> &lang; </span>
				<span class="left hook"></span>
				<span class="month-year" id="label"> June 2010 </span>
				<span class="right hook" id=""></span>
				<span class="right button" id="next"> &rang; </span>
			</div>
			<table id="days">
				<tr>
					<td>Dom</td>
					<td>Lun</td>
					<td>Mar</td>
					<td>Mie</td>
					<td>Jue</td>
					<td>Vie</td>
					<td>Sab</td>
				</tr>
			</table>
			<div id="cal-frame">
				<table class="curr">
					<tr><td class="nil"></td><td class="nil"></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
					<tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td class="today">11</td><td>12</td></tr>
					<tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
					<tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
					<tr><td>27</td><td>28</td><td>29</td><td>30</td><td class="nil"></td><td class="nil"></td><td class="nil"></td></tr>
				</table>
			</div>
		</div>

		<div id="noticia">
			<fieldset id="not">
				<u><p>NOTICIAS</p></u>
			</fieldset>
			
		</div>

	</div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="javascript/calendar.js"></script>
<script>
var cal = CALENDAR();

cal.init();
</script>
</html>