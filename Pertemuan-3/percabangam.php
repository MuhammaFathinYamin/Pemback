<?php 

// jika nilai  > 90 , Grade A
// Jika > 80 , Grade B
// Jika > 75, Grade B+
// selain itu Grade C

$nilai = 77 ;

if ($nilai > 90 ) {
    echo "Grade A" ;
} elseif ($nilai > 80) {
    echo "Grade B";
} elseif ($nilai > 75) {
    echo "Grade B+";
} else {
    echo "Grade C";
}