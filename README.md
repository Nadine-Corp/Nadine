![Sans-titre-1](https://user-images.githubusercontent.com/74113050/116277970-03eeb880-a754-11eb-9567-84a5b0099e57.jpg)




# Vous aussi : aimez Nadine !

Aidez tous les artistes-auteurs de [la Maison des Artistes](https://www.lamaisondesartistes.fr/) à trouver Nadine dans l'immensité du web : mettez une étoile ⭐ à ce projet !


# Table des matières
1. [À propos de Nadine](#à-propos-de-nadine)
1. [Tarif](#tarif--gratuit-à-vie-)
1. [Installation](#la-fameuse-installation-en-20-minutes)
1. [Mettre à jour sa Nadine](#mettre-à-jour-Nadine-)
1. [Contact](#besoin-d-aide--une-question--une-idée-)
1. [Roadmap](#roadmap-de-la-disruption)


## À propos de Nadine

Nadine, c'est quoi ? Nadine, c'est vous ! C'est le premier logiciel gratuit et open source de compta conçu pour les artistes-auteurs de [la Maison des Artistes](https://www.lamaisondesartistes.fr/) : essayer Nadine, c'est l'adopter. 👍

## Tarif : gratuit à vie !

Il n'y a pas d'arnaque : Nadine, c'est gratuit et le restera pour toute la vie. Jamais elle ne vous quittera.

## La Fameuse installation en 20 minutes

Toutes les équipes de [NadineCorp©](http://nadinecorp.net/) travaillent dur pour rendre Nadine chaque jour plus simple a utiliser. En attendant, vous allez devoir mériter le bonheur quotidien de travailler avec Nadine. Courage !

1. Installez un serveur Apache en Localhost. Rien de compliqué : pour Windows, installez [Wamp](https://www.wampserver.com/) (avec un W comme dans *Windows*), pour MacOS, installez [Mamp](https://www.mamp.info/en/downloads/) (avec un M comme dans *MacOS*) et pour Linux, installez [Xampp](https://www.apachefriends.org/fr/index.html) (avec un X comme dans *Xénophobe*).
1. Grace à votre nouveau logiciel (aka [Wamp](https://www.wampserver.com/), [Mamp](https://www.mamp.info/en/downloads/) ou [Xampp](https://www.apachefriends.org/fr/index.html)), [apprenez et créez une base de données](https://www.google.com/search?q=comment+cr%C3%A9er+une+base+de+donn%C3%A9e+avec+wamp). Vous pouvez l'appeler *nadine* si vous le souhaitez.
1. [Téléchargez la dernière version de Nadine](https://github.com/Nadine-Corp/Nadine/archive/main.zip) au format zip, puis déposez cette archive dans le dossier *www* ou *htdocs* de votre nouveau serveur Apache. Dézippez Nadine.
1. Dans les fichiers de Nadine que vous venez de désarchivez, retrouver le fichier */core/config.php*. Ouvrez-le avec le Bloc-Note (ou n'importe quelle application de traitement de texte), puis modifiez les valeurs  *$servername = "localhost"*, *$username = "root"*, *$password = ""*, *$dbname = "nadine"* en fonction de la configuration de votre nouveau serveur.
1. Ça y est ! Vous y êtes ! À vous le confort : désormais, Nadine s'occupe de tout.


## Mettre à jour Nadine ?

Bientôt : un système de mise à jour automatique rivalisant avec ceux des plus grands. Pour le moment : un peu d'huile de coude. Si vous avez la moindre question ou le plus petit doute, toutes les équipes de NadineCorp.© se tiennent prêtes à vous aider 24 H / 24H et 7 J / 7 au [NadineClub©](https://discord.gg/Fg2m8gvdWR) sur Discord.

1. Préparez un stylo et un papier.
1. Ouvrez votre Nadine comme vous le faîtes tous les jours.
1. Notez sur votre papier à l'aide de votre stylo le numéro de version de Nadine que vous utilisez actuellement. Vous pouvez trouvez ce numéro de version en bas de toutes les pages.
1. Rendez-vous sur [l'historique du projet](https://github.com/Nadine-Corp/Nadine/commits/main) et cherchez le numéro du patch le plus récent. Notez ce second numéro sur votre papier à l'aide de votre stylo.
1. Si le second numéro est égale au premier noté sur votre papier, vous pouvez arrêter de lire ce texte ennuyeux dès maintenant et reprendre votre vie normale. Bravo et merci encore !
1. Si le second numéro est supérieur au premier noté sur votre papier,vous devez mettre à jour Nadine.
1. **Mieux vait prévenir que guérir !** Nous allons sauvegarder votre Nadine avant d'aller plus loin :
  1. RDV dans le dossier *www* ou *htdocs* de votre serveur Apache (aka [Wamp](https://www.wampserver.com/), [Mamp](https://www.mamp.info/en/downloads/) ou [Xampp](https://www.apachefriends.org/fr/index.html)). Copier-coller les fichiers de Nadine sur votre bureau (ou n'importe où ailleurs).
  1. Ouvez le fichier */core/config.php* avec le Bloc-Note (ou n'importe quelle application de traitement de texte). Notez sur votre papier à l'aide de votre crayon les valeurs des variables suivantes *$servername =*, *$username, *$password*, *$dbname*. Dès que c'est fait, vous pouvez refermer ce fichier.
  1. Apprenez à ouvrir [*phpMyAdmin* pour faire une sauvegarde de votre base de données](https://www.google.com/search?q=phpmyadmin+sauvegarder+une+base+de+donn%C3%A9es).
1. [Téléchargez la dernière version de Nadine](https://github.com/Nadine-Corp/Nadine/archive/main.zip) au format zip, puis déposez cette archive dans le dossier *www* ou *htdocs* de votre serveur Apache. Dézippez Nadine.
1. Dans les fichiers de Nadine que vous venez de désarchivez, retrouver le fichier */core/config.php*. Ouvrez-le avec le Bloc-Note (ou n'importe quelle application de traitement de texte), puis modifiez les valeurs  *$servername = "localhost"*, *$username = "root"*, *$password = ""*, *$dbname = "nadine"* en inscrivant celle sur votre papier.
1. Ouvrez votre Nadine et vérifier que tout semble fonctionner correctement. Si oui : vous pouvez souffler ! C'est terminé. Bravo à vous !
1. Gardez les fichiers de votre ancienne Nadine et la sauvegarde de votre base de données quelques jours au cas où. Si quelques semaines plus tard tout semble ok, vous pouvez les supprimer de votre disque dur.
1. **Important :** pensez à recycler le papier.


**Un problème après la mise à jour ?**

Pas de panique ! Plusieurs solutions simples s'offrent à vous :
  1. Foncez sur le Discord du [NadineClub©](https://discord.gg/Fg2m8gvdWR) pour demander de l'aide : nos meilleurs ingénieurs-informaticiens seront vous dépaner.
  1. Supprimez la nouvelle version de Nadine et remettez l'ancienne temporairement.
  1. Nadine étant encore en Alpha, il nous arrive de ré-organiser un peu la base de donnée lorsque nous ajoutons des fonctions. Vous n'avez probablement qu'une ou deux colonne à ajouter ou renonmer pour que tout fonctionne de nouveau correctement. Passez sur Discord au [NadineClub©](https://discord.gg/Fg2m8gvdWR) : nous vous indiquerons quoi faire.


## Besoin d'aide ? Une question ? Une idée ?

Nos équipes vous accueillent au [NadineClub©](https://discord.gg/Fg2m8gvdWR) sur Discord 24 H / 24H et 7 J / 7. C'est aussi ça *le service by [NadineCorp©](http://nadinecorp.net/)*.

Tenez-vous au courant des annonces de [NadineCorp©](http://nadinecorp.net/) grâce au [NadineNetwork©](https://lnk.bio/nadinecorp) : suivez-nous sur [Twitter](https://twitter.com/NadineCorp), [Instagram](https://www.instagram.com/nadinecorpofficiel/) et [Facebook](https://www.facebook.com/NadineCorpOfficiel).


## Roadmap de la Disruption

- [x] **Version Alpha 0.1 :** éditer, sauver et modifier des devis ou factures par projet. Donc gérer les projets, mais aussi les diffuseurs.
- [ ] **Version Alpha 0.2 :** simplifier la déclaration annuelle à l'[URSSAF](https://www.artistes-auteurs.urssaf.fr/). Donc gérer aussi les rétrocessions et les artistes, le précompte, la vente à des privés, etc.
- [ ] **Version Alpha 0.3 :** permettre d'installer facilement Nadine et pouvoir y accéder de partout. Donc pouvoir installer sur un serveur en ligne, gérer des comptes utilisateur, des mots de passe, garantir le secret bancaire, etc.
- [ ] **Version Alpha 0.4 :** permettre de mettre à jour Nadine automatiquement.
- [ ] **Objectif ultime :** rendre le monde meilleur.
