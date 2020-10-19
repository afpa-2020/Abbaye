/*
Auteur : Maxime MONTAGNE
Dernière modification le 26/08/20
*/
let bddClients = [
    {
    "id" : 1,
    "type" : "Privé",
    "raisonSociale" : "Ubisoft",
    "adresse": "32 rue du Lustucru",
    "cp" : '75000',
    "ville" : "Rennes",
    "telephone": "0572823232",
    "mail": "ubi.ubi@ubisoft.com",
    "domaine" : "Jeux, Applications",
    "nature" : "Principale",
    "ca" : 1800,
    "effectif" : 300,
    "commentaire" : "blablablablablablabla",
    },
    {
    "id" : 2,
    "type" : "Privé",
    "raisonSociale" : "Michelin",
    "adresse": "26 rue de la Caire",
    "cp" : '63000',
    "ville" : "Clermont-Ferrand",
    "telephone": "0473123212",
    "mail": "micheline@michelin.com",
    "domaine" : "Pneumatique",
    "nature" : "Principale",
    "ca" : 2200,
    "effectif": 10000,
    "commentaire" : "blobloblbolbolbolbo",
    },
    {
    "id" : 3,
    "type" : "Privé",
    "raisonSociale" : "Chez Joze",
    "adresse": "10 place St Claire",
    "cp" : '02300',
    "ville" : "Agdes",
    "telephone": "0572823232",
    "mail": "jozejo@gmail.com",
    "domaine" : "Restauration",
    "nature" : "Principale",
    "ca" : 150,
    "effectif" : 27,
    "commentaire" : "C'est bon",
    },
    {
    "id" : 4,
    "type" : "Privé",
    "raisonSociale" : "Kebabobab",
    "adresse": "15 avenue de la Gare",
    "cp" : '63800',
    "ville" : "Cournon",
    "telephone": "0579923232",
    "mail": "kebaobab@gmail.com",
    "domaine" : "Restauration",
    "nature" : "Principale",
    "ca" : 10,
    "effectif" : 4,
    "commentaire" : "C'est pas glutten-free.",
    },
    {
    "id" : 5,
    "type" : "Privé",
    "raisonSociale" : "Style coiff'",
    "adresse": "20 rue de la mèche",
    "cp" : '03000',
    "ville" : "Aurillac",
    "telephone": "0532903232",
    "mail": "giselle@hotmail.com",
    "domaine" : "Salon de Coiffure",
    "nature" : "Principale",
    "ca" : 1800,
    "effectif" : 300,
    "commentaire" : "blablablablablablabla",
    },
    {
    "id" : 6,
    "type" : "Publique",
    "raisonSociale" : "Abracad",
    "adresse": "2 avenue de la disparition",
    "cp" : '10200',
    "ville" : "Bouillade",
    "telephone": "0472820232",
    "mail": "shazam@gmail.com",
    "domaine" : "Salle de Spectacle",
    "nature" : "Secondaire",
    "ca" : 1800,
    "effectif" : 300,
    "commentaire" : "blablablablablablabla",
    },
    {
    "id" : 7,
    "type" : "Publique",
    "raisonSociale" : "Sven Co",
    "adresse": "2 avenue de la disparition",
    "cp" : '70200',
    "ville" : "Bouillade",
    "telephone": "0472820232",
    "mail": "shazam@gmail.com",
    "domaine" : "Salle de Spectacle",
    "nature" : "Secondaire",
    "ca" : 1800,
    "effectif" : 300,
    "commentaire" : "blablablablablablabla",
    },
    {
        "id" : 8,
        "type" : "Publique",
        "raisonSociale" : "Eighteens",
        "adresse": "2 avenue de la disparition",
        "cp" : '10200',
        "ville" : "Bouillade",
        "telephone": "0472820232",
        "mail": "shazam@gmail.com",
        "domaine" : "Salle de Spectacle",
        "nature" : "Secondaire",
        "ca" : 1800,
        "effectif" : 300,
        "commentaire" : "blablablablablablabla",
    },
    {
        "id" : 9,
        "type" : "Publique",
        "raisonSociale" : "Nince o'clock",
        "adresse": "2 avenue de la disparition",
        "cp" : '10200',
        "ville" : "Bouillade",
        "telephone": "0472820232",
        "mail": "shazam@gmail.com",
        "domaine" : "Salle de Spectacle",
        "nature" : "Secondaire",
        "ca" : 1800,
        "effectif" : 300,
        "commentaire" : "blablablablablablabla",
    },
    {
        "id" : 10,
        "type" : "Publique",
        "raisonSociale" : "Dix Dix",
        "adresse": "2 avenue de la disparition",
        "cp" : '10200',
        "ville" : "Bouillade",
        "telephone": "0472820232",
        "mail": "shazam@gmail.com",
        "domaine" : "Salle de Spectacle",
        "nature" : "Secondaire",
        "ca" : 1800,
        "effectif" : 300,
        "commentaire" : "blablablablablablabla",
    },
    {
        "id" : 11,
        "type" : "Publique",
        "raisonSociale" : "Elle et Veune",
        "adresse": "2 avenue de la disparition",
        "cp" : '10200',
        "ville" : "Bouillade",
        "telephone": "0472820232",
        "mail": "shazam@gmail.com",
        "domaine" : "Salle de Spectacle",
        "nature" : "Secondaire",
        "ca" : 1800,
        "effectif" : 300,
        "commentaire" : "blablablablablablabla",
    },
    {
        "id" : 12,
        "type" : "Publique",
        "raisonSociale" : "Tout elle",
        "adresse": "2 avenue de la disparition",
        "cp" : '10200',
        "ville" : "Bouillade",
        "telephone": "0472820232",
        "mail": "shazam@gmail.com",
        "domaine" : "Salle de Spectacle",
        "nature" : "Secondaire",
        "ca" : 1800,
        "effectif" : 300,
        "commentaire" : "blablablablablablabla",
        },
];

let bddContacts =
[
    {
        "id": 1,
        "nom" : "Mambo",
        "prenom" : "Jacky",
        "mail" : "mambo@ubisoft.com",
        "fonction" : "C",
        "clientId" : 1,
    },
    {
        "id": 2,
        "nom" : "Freeman",
        "prenom" : "Jacob",
        "mail" : "freeman@ubisoft.com",
        "fonction" : "RC",
        "clientId" : 1,
    },
    {
        "id": 3,
        "nom" : "Dirty",
        "prenom" : "Larry",
        "mail" : "dirty@ubisoft.com",
        "fonction" : "RH",
        "clientId" : 1,
    },
    {
        "id": 4,
        "nom" : "Desplaines",
        "prenom" : "Thierry",
        "mail" : "desplaines@michelin.com",
        "fonction" : "C",
        "clientId" : 2,
    },
    {
        "id": 5,
        "nom" : "Neves",
        "prenom" : "Océanne",
        "mail" : "freeman@michelin.com",
        "fonction" : "C",
        "clientId" : 2,
    },
    {
        "id": 6,
        "nom" : "Jolie",
        "prenom" : "Sarah",
        "mail" : "jolie@michelin.com",
        "fonction" : "RC",
        "clientId" : 2,
    },
    {
        "id": 7,
        "nom" : "Dubois",
        "prenom" : "Damien",
        "mail" : "dubois@ubisoft.com",
        "fonction" : "RC",
        "clientId" : 1,
    }
];

let bddUsers = [
    {
        "id" : 1,
        "email" : "theo@abi.fr",
        "pseudo" : "Théo",
        "password" : "chameau",
        "role" : "Commercial"
    },
    {
        "id" : 2,
        "email" : "simon@abi.fr",
        "pseudo" : "Simon",
        "password" : "gourde",
        "role" : "RH"
    },
    {
        "id" : 3,
        "email" : "marine@abi.fr",
        "pseudo" : "Marine",
        "password" : "chat",
        "role" : "RC"
    }
];