#Project PHP#

##Afwezigheden en lokaalwijzigingen##

###DEADLINE = 12 MEI###

* Registratie
* Login (eigen db voorlopig)

* Database tabellen:

| **tblStudent**  	| **tblDocent**   	| **tblVak**		| **tblLokaal**		| **tblKlas**		| **tblRooster**	| 
| ----------------- | ----------------- | ----------------- | ----------------- | ----------------- | ----------------- |
| StudentID     	| Voornaam			| VakID				| LokaalID			| KlasID			| RoosterID			|
| KlasID        	| Achternaam    	| VakNaam			| LokaalNaam		| KlasNaam			| VakID				|
| Studentennummer	| Aanwezigheid		| 					|  					|  					| DocentID 			|
| Voornaam      	|  					|					|  					| 					| LokaalID 			|
| Achternaam    	|             		|					| 					| 					| KlasID 			|
| 			    	|             		|					| 					| 					| Dag	 		    |
| 			    	|             		|					| 					| 					| Van			 	|
| 			    	|             		|					| 					| 					| Tot			 	|
| 			    	|             		|					| 					| 					| Actief			|