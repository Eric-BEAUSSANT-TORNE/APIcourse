<h1>Grupp 8 - Projekt API </h1>
Grupp 8: API - Projekt

Sidans funktionalitet: 
Registrera användare
Logga in
Som inloggad kunna generera API-nyckel

Tabeller i databasen:
Authors,
Books,
Category,
Publisher

Du behöver ha en API-nyckel för att kunna hämta.
Om du inte har en API-nyckel kan du hämta en via:
http://apiprojekt.mistert.se/APIcourse/Pages/index.php

Då behöver du skapa ett konto. 
Krav för att skapa konto:
Användarnamn minst 4 tecken.
Lösenord minst 4 tecken.

Sedan behöver du logga in, och generera en API-nyckel. Om du inte tycker om den, kan du generera en ny. 

Sen behöver du lägga in din api nyckel i postman. Det gör du i ‘Authorization’. Det behövs för alla requests. 
Key = apikey
Value = din genererade api-nyckel. 

GET:
Hämta en rad från en tabell:
?table=tabell&id=1
Ex: http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher&id=1
Hämta alla rader från en tabell:
?table=tabell
Ex: http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher
POST:
Params
?table=tabell
Ex: http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Books
Body
Books ex:
{
    "Namn": "Mr. T Third Edition",
    "Beskrivning": "Handlar om en kill som gillar bägare.",
    "Sidantal": 2553,
    "Pubid": 2,
    "Catid": 1
}
Authors ex:
{
     “Förnamn” : “Eric”,
     “Efternamn” : “Sade”
}
Category ex:
{
     “Namn” : “Sport”
}
Publisher ex:
{
     “Namn” : “Något Förlag”
}
PUT:
Params:
Samma som Post.
Body
Samma som Post, men lägg till id, exempel:
{
     "id" : 8,
    "Namn": "Felixs Bägare",
    "Beskrivning": "Bytte ju igen, o igen!",
    "Sidantal": 255,
    "Pubid": 1,
    "Catid": 3
}
Delete:
Params:
Samma som post.
Body
{
	"id" : 0
}
