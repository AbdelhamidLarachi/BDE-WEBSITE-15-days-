# BDE-WEBSITE-15-days-
CONTEXTE Notre BDE souhaite un site Internet à la hauteur d’une école d’ingénieur informatique afin de gérer principalement la promotion des manifestations et une boutique de vente en ligne. Les personnes qui auront un rôle seront bien sûr les membres du BDE mais aussi les étudiants et certains salariés du CESI.  Les objectifs sont de faciliter l’organisation et la communication de manifestations au sein de l’école, et de proposer aux membres des goodies à l'effigie du BDE.  Chaque BDE possède son propre site Internet. Toutefois les informations des utilisateurs sont centralisées sur un unique serveur utilisé par tous les BDE, un étudiant pouvant être amené durant son cursus à changer de centre.

BESOINS
Suite à une étude générale faite auprès des demandeurs, les user stories ci-dessous ont été définies.

Étudiants
En tant qu'étudiant de l'école je peux :

M’inscrire sur le site en fournissant mon nom, prénom, localisation (centre CESI actuel) et adresse mail ainsi qu’un mot de passe contenant au moins une majuscule et un chiffre.
Après avoir réalisé l’inscription, me connecter.
Consulter la totalité du site (liste des activités, commentaires, photos...) et accéder à la boutique (sans pour autant pouvoir procéder à l'achat).


En tant qu’étudiant connecté je peux :

M’inscrire à l’une des activités proposées par les membres du BDE.
Accéder à la « boite à idées » et voter pour les activités proposées par les autres étudiants.
Proposer une idée d’activité aux membres du BDE. Cette idée sera visible de tous les visiteurs connectés au site dans la partie « boite à idées ». 
Ajouter des photos sur les événements passés pour lesquels j’étais inscris.
Commenter et liker les photos d’un événement passé.


Membres du BDE
En tant que membre du BDE, je peux :

Poster une manifestation avec une description, une image et une date, dans une partie « événement du mois ». Cette manifestation peut être ponctuelle ou récurrente, payante ou gratuite.
Accéder à l’ensemble des manifestations proposées par les étudiants dans la partie « boîte à idées ».
Choisir une manifestation proposée dans la partie « boîte à idées » proposée par les étudiants de l’école. Une fois cette manifestation sélectionnée, je dois lui attribuer une date et éventuellement modifier l’image et la description. L’étudiant ayant proposé cette idée sera notifié que son idée a été retenue.
Accéder, pour chaque manifestation proposée, à la liste des inscrits et la télécharger au format PDF ou CSV.
Administrer les photos et commentaires de la partie « événements passés ».

Salariés CESI
En tant que personnel CESI, je peux :

Seulement notifier l’ensemble des membres du BDE que certaines photos, commentaires, manifestations peuvent nuire à l’image de l’école. Dans ce cas les éléments ne peuvent être rendus public.
Naviguer sur l’ensemble du site avec les mêmes droits que les étudiants.
Télécharger via un bouton l’ensemble des photos postés par les étudiants et les membres du BDE.


Boutique

Les exigences spécifiques aux parties prenantes énoncées précédemment sont les suivantes :

Les membres du BDE peuvent ajouter, supprimer des produits avec nom, description et prix, en les classant par catégories (ces dernières peuvent être ajoutées également par les membres du BDE).
Les étudiants connectés peuvent passer commande par l’intermédiaire d’un panier. Si la commande n’est pas finalisée par l’étudiant alors le panier est sauvegardé et l’étudiant retrouve sa liste de produits à sa prochaine reconnexion.
Lorsqu’une commande est passée par un étudiant, les membres du BDE reçoivent une notification par mail. Ils pourront alors donner un rendez-vous à l’étudiant pour la transaction et la remise des goodies. Par la suite, un compte PayPal sera mis en place. Si vous pouvez préparer le terrain, ce serait un plus très apprécié.
Dans la section boutique du site, une partie affichant les 3 articles les plus commandés doit être visible. 
Afin de faciliter la recherche des goodies, il faudra offrir une fonctionnalité de recherche : bar simple avec auto complétion ou formulaire. Il devra également être possible a minima de filtrer sur le prix et les catégories.


CONTRAINTES
Membres du BDE
Les membres du BDE souhaitent avoir un site vitrine attrayant, ergonomique et utilisant des technologies modernes pour une navigation fluide et homogène quel que soit le support utilisé (ordinateur, tablette ou smartphone). La charte graphique doit être celle de l’école d’ingénieur CESI.

Ils souhaitent également savoir comment le site peut être rapidement visible dans Google en tapant des mots comme « BDE CESI Saint-Nazaire » ou « bureau des étudiants rouen ». 	


Enfin ils veulent connaitre exactement le coût annuel tout compris (hébergement, nom de domaine).



Interne
En plus des recommandations des membres du BDE, les points suivants devront être respectés :

Réalisation d’une maquette visuelle en amont de la conception : zoning, wireframes, mockups, à vous de choisir le degré de complexité.
Pour la partie administration, utilisation de tableaux remplis en AJAX incluant filtrage et pagination (voir ressources).
Les formulaires doivent être validés en Javascript.
Chaque page générée doit être valide W3C (HTML et CSS).
Pas d’utilisation de CMS.
Les données relatives aux utilisateurs sont stockées sur un autre serveur.


Technique
Une attention particulière doit être apportée aux contraintes techniques suivantes :

La partie visible du site du BDE de votre école se fera en PHP, HTML, CSS et JavaScript. Vous pouvez utiliser des préprocesseurs CSS tels que le LESS ou le Sass. Idem pour le JavaScript, vous pouvez vous appuyer sur le framework jQuery.
Vous utiliserez une base de données sous MySQL. Pour les utilisateurs il faut savoir que cette base de données sera commune à tous les BDE des école d’ingénieurs CESI. Concernant les manifestations elles peuvent au choix être stockées dans une autre base de données en local ou dans la base de données nationale. Vous serez capable de justifier votre choix. 
La gestion des API REST se fera via un serveur Node.js.
La sécurité est essentielle : toutes les requêtes issues des formulaires devront être filtrées et validées en utilisant les fonctionnalités PHP. Idem pour l’accès aux API REST qui devront utiliser un mécanisme d’authentification tel que les tokens.
Il faut donc mettre en place pour ce projet deux serveurs Web : un en PHP et l’autre sous Node.js 

Aspects juridiques
Les membres du BDE ce sont aperçus qu'ils n'avaient pas évoqués la partie juridique dans le cahier des charges initial.

Après s'être renseignés auprès de différents experts en droit informatique, le site doit impérativement contenir :

Une page dédiée aux « mentions légales » contenant toutes les informations obligatoires.
Une fenêtre qui informe l'utilisateur de la finalité des cookies en lui demandant son  consentement à leurs utilisations.
Lors de l’inscription un lien vers les mentions légales ainsi qu’une case à cocher demandant à l’utilisateur d’accepter les conditions du règlement (stockage des informations personnelles, droit à l’oubli).
Le site proposant une partie boutique, des conditions générales de vente doivent également être présentes.
Ces notions étant essentielles, elles donneront lieu à une note à part.


RÉALISATION
Déroulement
Le projet se déroule du 16/01/2019 au 30/01/2019. Vous travaillerez par groupe de 3 à 5 personnes.

Des points pourront être mis en place par les tuteurs afin de valider les différentes phases de réalisation (MCD, maquette, site statique…).

La durée de la soutenance est de 20 minutes + 10 minutes de questions. La première partie, plus commerciale, se déroulera en anglais et donnera lieu à une note à part. La seconde partie technique ainsi que les questions pourront se faire en français.


Livrables
Les livrables suivants vous sont demandés :

Un dossier de conception intégrant un MCD (à rendre pour le lundi 21 janvier en fin de journée) et donnant lieu à une note à part.
Une maquette fonctionnelle.
Chaque livrable devra être de qualité et uniforme (charte graphique, police…). Le code source sera lisible et commenté.

Les choix des technologies utilisées devront être justifiés.
