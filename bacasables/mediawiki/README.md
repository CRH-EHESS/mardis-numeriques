# Mediawiki et extensions


Cette image Docker fournit une instance de Mediawiki avec plusieurs pré-installées.

Liste des extensions pré-installées : 
* [Semantic Mediawiki](https://www.semantic-mediawiki.org/wiki/Semantic_MediaWiki) : Ajoute des fonctionnalités "Web sémantique" au Wiki.
* [Cite](https://www.mediawiki.org/wiki/Extension:Cite/fr) : Permet d'ajouter une section référence *à la Wikipedia*.
* [WikiEditor](https://www.mediawiki.org/wiki/Extension:WikiEditor) : Ajoute un éditeur de pages plus convivial.
* [Maps](https://www.mediawiki.org/wiki/Extension:Maps/fr) : Ajout les fonctionnalités cartographiques.
* [DataTransfer](https://www.mediawiki.org/wiki/Extension:Data_Transfer) : Ajout des fonctionnalités d'import de données en masse.

## Installation

Docker et Docker-compose doivent être installés. Voir [la page d'acceuil du dépot des bacs à sable pour plus d'information]().

Depuis une console, se placer dans le répertoire /mediawiki puis :
```bash
docker-compose -p mardis-numeriques up -d
```
Mediawiki est ensuite accessible à l'adresse `http://localhost:8081`.

**Note**: l'initialisation de Mediawiki peut durer plusieurs minutes. Pendant ce temps, une connexion sur `http://localhost:8081` aboutira à une erreur. Pour suivre le déroulement de l'initialisation : `docker logs mardisnumeriques_wiki_1 -f`


### Post installation
Identifiants de l'utilisateur par défaut :
* Nom d’utilisateur : `admin`
* Mot de passe : `password`



## Exemples : coupler SemanticMediawiki et Maps

### Une page affichant des cartes à partir de coordonnées et de propriétés sémantiques
La page doit s'appeler **Test** pour que le code ci-dessous fonctionne.
```
[[Category:page d'exemple]]

== Un exemple de Géocodage ==

EHESS, à Paris : {{#geocode:EHESS, Paris}}

== Un exemple de carte à partir de coordonnées ==
=== Depuis plusieurs coordonnées décrites dans le code de la page ===
{{#display_map:48° 51' 0.63" N, 2° 19' 36.66" E ; 48.8480057,2.3301483 }}

=== Avec un lieu géocodé automatiquement===
{{#display_map:EHESS, Paris}}

=== Depuis une propriété sémantique définie dans le code de la page ===
{{#set:geographic coordinates = {{#geocode:EHESS, Paris}} }}

{{#display_map:
  {{#show:Test| ?geographic coordinates }}
}}
```

### Une page contenant une carte affichant toutes les pages ayant des coordonnées déclarées comme propriétés sémantiques
```
{{#ask:		<!-- {{#ask: code de la requête }} déclare une requête-->
	[[geographic coordinates::+]]	<!-- Filtre : on récupère toutes les pages ayant au moins une propriété de coordonnées. -->
	|?geographic coordinates <!-- On demande la valeur de la propriété geographic coordinates -->
	|format=map <!-- On affiche le résultat de la requête sous forme de carte-->
	|height=500
}}
```
