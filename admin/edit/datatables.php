<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.editor.css">
	<link rel="stylesheet" type="text/css" href="css/shCore.css">
	<link rel="stylesheet" type="text/css" href="css/rasp.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.4.custom.css">
	<link rel="stylesheet" type="text/css" href="css/selectize.bootstrap3.css">	
	<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.tableTools.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.editor.js"></script>
	<script type="text/javascript" language="javascript" src="js/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="js/rasp.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/selectize.min.js"></script>	

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css">
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" class="init">

var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
	$("#parapapapa").hide() 
	$( "#button2" ).click(function() {
	$( "#parapapapa" ).hide( "fast", function() {
	})});
	$( "#button" ).click(function() {
	$( "#parapapapa" ).hide( "fast", function() {
	});
	$( "#parapapapa" ).show( "fast", function() {
	});	
	editor = new $.fn.dataTable.Editor( {
		ajax: {
			url: "join.php", 
			type: 'POST'
			},
		table: "#example",
	    i18n: {		
			create: {
				button: "Создать",
				title:  "Создать новую запись",
				submit: "Создать"
			},
			edit: {
				button: "Редактировать",
				title:  "Изменить запись",
				submit: "Обновить"
			},
			remove: {
				button: "Удалить",
				title:  "Удалить",
				submit: "Удалить",
            confirm: {
                _: "Вы уверены, что хотите удалить %d записей?",
                1: "Вы уверены, что хотите удалить 1 запись?"
            }
        },
			error: {
				system: "Произошла ошибка, обратитесь к системному администратору"
			}
		},	
		fields: [ {
				label: "Номер пары:",
				name: "rasp.id_lesson",
				type: "select",
                ipOpts: [
                    { label: "1",  value: "1" },
                    { label: "2",  value: "2" },
                    { label: "3",  value: "3" },
                    { label: "4",  value: "4" },
                    { label: "5",  value: "5" }
                ]				
			}, {
				label: "Название предмета:",
				name: "rasp.id_title",
				type: "select",
			}, {
				label: "Аудитория:",
				name: "rasp.id_room",
				type: "select"					
			}, {
				label: "Преподаватель:",
				name: "rasp.id_lecturer",
				type: "select"
			}
			, {
				name: "rasp.id_group",
				type: "hidden",
				def: $("#group-selector").val()
			},	{
				name: "rasp.id_department",
				type: "hidden",
				def: $("#faculty-selector").val()
			},  {
				name: "rasp.day_of_week",
				type: "hidden",
				def: $("#days-selector").val()

			},	{
				name: "rasp.parity",
				type: "hidden",
				def: $("#parity-selector").val()
			}		
		]

		} );

		editor.on( 'submitComplete', function () {
		$('#example').DataTable().ajax.reload();
		});


		$('#example').dataTable( {
	    "processing": true,
		fnServerParams: function ( aoData ) {
			aoData.push({ 	"name": "g",
							"value": $("#group-selector").val()
						});
			aoData.push({			
							"name": "d",
							"value": $("#faculty-selector").val()
						});
			aoData.push({			
							"name": "w",
							"value": $("#days-selector").val()
						});
			aoData.push({			
							"name": "p",
							"value": $("#parity-selector").val()
						});						
		},
		language: {
        url: 'http://cdn.datatables.net/plug-ins/28e7751dbec/i18n/Russian.json'
		},
		dom: "Tfrtip",
		ajax: {
			url: "join.php", 
			type: 'POST'
			},
		columns: [
			{ data: "rasp.id_lesson" },
			{ data: "titles.title" },
			{ data: "rooms.room" },
			{ data: "lecturers.fullname" }
		],
		tableTools: {
			sRowSelect: "os",
			aButtons: [
				{ sExtends: "editor_create", editor: editor },
				{ sExtends: "editor_edit",   editor: editor },
				{ sExtends: "editor_remove", editor: editor }
			]
		},
		bDestroy: true,
		initComplete: function ( settings, json ) {
			// Populate the site select list with the data available in the
			// database on load
			editor.field( 'rasp.id_room' ).update( json.rooms );
			editor.field( 'rasp.id_lecturer' ).update( json.lecturers );
			editor.field( 'rasp.id_title' ).update( json.titles );



		}
	} );
} );
	});


	</script>	


</head>

<body class="dt-example">
					 <?php
					include("sql.php");
					$sql4 = "SELECT * FROM `departments` ";
					$result4 = mysql_query($sql4) or die("Couldn't connect to the database!");
					$sql5 = "SELECT * FROM `group`";
					$result5 = mysql_query($sql5) or die("Couldn't connect to the database!");
					$selected="";
					$forma="
      			 <select name=faculty id=faculty-selector class='bootstrap-select' data-live-search='true' style='width:200px;'>
				  <option value='' selected=selected > - Укажите факультет- </option>";
					while ($row4 = mysql_fetch_assoc($result4))
					{
					$forma .= "<option  ".$selected." value=".$row4['id_department'].">".$row4['department']."</option>";
					$selected="";
					};
					$forma .="
				  </select>
					<select name=group id=group-selector class='bootstrap-select' data-live-search='true' style='width:200px; '>
					<option value='' selected=selected > - Укажите группу- </option>";
					 while ($row5 = mysql_fetch_assoc($result5))
					{
					$forma .= "<option ".$selected." value='".$row5['id_group']."' >".$row5['name_group']."</option>";
					$selected="";
					};
					$forma .="
				</select>";
				
				echo "$forma";
				?>	
      			 <select name=days id=days-selector class='bootstrap-select' data-live-search='true' style='width:200px;'>
				  <option value='' selected=selected > - Укажите день- </option>
				  <option   value=1>Понедельник</option>
				  <option   value=2>Вторник</option>
				  <option   value=3>Среда</option>
				  <option   value=4>Четверг</option>
				  <option   value=5>Пятница</option>
				  <option   value=6>Суббота</option>
				  </select>
      			 <select name=parity id=parity-selector class='bootstrap-select' data-live-search='true' style='width:200px;'>
				  <option value='' selected=selected > - Укажите четность недели- </option>
				  <option   value=1>Четная</option>
				  <option   value=2>Нечетная</option>
				  </select>	
<script>
$('#faculty-selector').selectize();
$('#group-selector').selectize();
$('#days-selector').selectize();	
$('#parity-selector').selectize();
</script>				  
				  
 <input type="button" value="Открыть" id="button"><input type="button" value="Закрыть" id="button2"> 
	<div id="parapapapa">
		<section>
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Номер пары</th>
						<th>Название предмета</th>
						<th>Аудитория</th>
						<th>Преподаватель</th>
					</tr>
				</thead>
			</table>

		</section>
	</div>	
</body>
</html>