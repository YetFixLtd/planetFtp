function my_button (imdb_id ) // ◄■■ RANDOM USER ID.
{
$.ajax( { type    : "POST",

data    : { "imdb_id" : imdb_id }, // ◄■■ RANDOM USER ID.
url     : "dcount.php",
success : function ( data )
		  { alert( data );
		  },
error   : function ( xhr )
		  { alert( "error" );
		  }
} );
}

function like(imdbid,like,user) // ◄■■ RANDOM USER ID.
{
$.ajax( { type    : "POST",

data    : { "imdbid" : imdbid,"like" : like,"user":user }, // ◄■■ RANDOM USER ID.
url     : "dcount.php",
success : function ( data )
		  { $("#likes").html(data);
		  },
error   : function ( xhr )
		  { alert( "error" );
		  }
} );
}

	  