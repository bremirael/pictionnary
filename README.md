**c'est quoi les attributs action et method ?**
-  action permet de définir la page qui va traiter le formulaire
-  method , permet de choisir si on traite les données en POST ou en GET par exemple
 
**qu'y a-t-il d'autre comme possiblité que post pour l'attribut method , get, put  ?**
Il y a aussi  DELETE et PATCH

**quelle est la différence entre les attributs name et id ?**

L'attribut id est lu par le navigateur et name est lu par le Php,
il sera récupérer en POST

**c'est lequel qui doit être égal à l'attribut for du label ?**

On Renseigne avec une valeur identique les attributs id et for de chaque couple
               
**quels sont les deux scénarios où l'attribut title sera affiché ?**

L'attribut sera affiché sur la balise et pour l'accessibilité concernant les personnes handicapés

**encore une fois, quelle est la différence entre name et id pour un input ?**
     
L'attribut id est lu par le navigateur et name est lu par le Php,
      il sera récupérer en POST    
      
**pourquoi est-ce qu'on a pas mis un attribut name ici**

On aura pas besoin de mettre un attribut name dans ce cas là car
le traitement est fait grâce au javascript

**à quoi sert l'attribut disabled ?**

Indique si l'élément est ou non désactivé. Si cette valeur est définie à true, l'élément est désactivé. Les éléments désactivés sont habituellement affichés avec leur texte grisé. Si l'élément est désactivé, il ne répond pas aux actions de l'utilisateur, il ne peut pas recevoir le focus, et l'évènement command ne se déclenchera pas.
L'élément répondra cependant encore aux évènements souris. Pour activer l'élément, ne spécifiez simplement pas cet attribut plutôt que de définir sa valeur à false. 

**à quoi servent ces champs hidden ?**

Ils servent à envoyer les commandes et la picture 