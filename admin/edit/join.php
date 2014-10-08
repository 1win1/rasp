<?php
$a = $_POST['g'];
$b = $_POST['d'];
$c = $_POST['w'];
$d = $_POST['p'];
// DataTables PHP library
include( "php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Join,
	DataTables\Editor\Validate;

$db->sql("SET character_set_client=utf8");
$db->sql("SET character_set_connection=utf8");
$db->sql("SET character_set_results=utf8");

/*
 * Example PHP implementation used for the join.html example
 */
$data = Editor::inst( $db, 'rasp' )
	->field( 
		Field::inst( 'rasp.id_lesson' ),
		Field::inst( 'rasp.id_lecturer' ),
		Field::inst( 'rasp.id_room' ),	
		Field::inst( 'rasp.id_title' ),
		Field::inst( 'lecturers.fullname' ),
		Field::inst( 'rooms.room' ),
		Field::inst( 'titles.title' ),
	    Field::inst( 'rasp.id_group' ),
		Field::inst( 'rasp.id_department' ),
		Field::inst( 'rasp.day_of_week' ),
		Field::inst( 'rasp.parity' )
	)
	->leftJoin( 'lecturers', 'lecturers.id_lecturer', '=', 'rasp.id_lecturer' )
	->leftJoin( 'titles', 'titles.id_title', '=', 'rasp.id_title' )	
	->leftJoin( 'rooms', 'rooms.id_room', '=', 'rasp.id_room' )	
	->where($key = 'rasp.id_group', $value=$a)
	->where($key = 'rasp.id_department', $value=$b)
	->where($key = 'rasp.day_of_week', $value=$c)
	->where($key = 'rasp.parity', $value=$d)	
	->process($_POST)
	->data();

if ( ! isset($_POST['action']) ) {
    // Get a list of lecturers for the `select` list
	$data['rooms'] = $db
     //   ->selectDistinct( 'rooms', 'id_room as value, room as label' )
		->query( 'select', 'rooms' )
			->get( 'id_room as value, room as label' )
			->order( 'label ASC' )
			->exec()
	->fetchAll();		
}
if ( ! isset($_POST['action']) ) {
	$data['lecturers'] = $db
		->query( 'select', 'lecturers' )
			->get( 'id_lecturer as value, fullname as label' )
			->order( 'label ASC' )
			->exec()		
	//	->selectDistinct( 'lecturers', 'id_lecturer as value, fullname as label' )
       ->fetchAll();
}
if ( ! isset($_POST['action']) ) {
	$data['titles'] = $db
		->query( 'select', 'titles' )
			->get( 'id_title as value, title as label' )
			->order( 'label ASC' )
			->exec()		
	//	->selectDistinct( 'lecturers', 'id_lecturer as value, fullname as label' )
       ->fetchAll();
}

echo json_encode( $data );
