<?php
function kode($id, $prefix){
	return $prefix.str_pad($id, 5, "0", STR_PAD_LEFT);
}
