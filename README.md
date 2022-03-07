# Projet---Emploi
Site d'offre de pole emploie 

Vous allez concevoir un site d'offres d'emploi.

Ce site contiendra 2 pages dans l'interface frontend :

Une page listant toutes les offres actives en base de données. Cette page contiendra un formulaire pour que les annonces puissent être filtrées par titre, type (CDI, CDD, Interim, Alternance) et par département. Par défault, elles seront affichées par ordre décroissant de leur date d'ajout (la dernière ajoutée est affichée en premier) mais cette ordre doit pouvoir être changé pour afficher les offres par odre croissant.

Les annonces auront une date maximale de publication qui sera définie par le site web. Si une annonce est plus vieille que cette date, elle ne sera pas affichée.

Les annonces seront paginées (maximum 15 annonces sur la page 1, 15 annonces sur la page 2, etc)

La deuxième page affichera une annonce avec son titre, sa date d'ajout, sa description, le salaire proposée, la durée de travail, etc. La page proposera une formulaire simplifié permettant de postuler à l'annonce (contenant uniquement un champs texte qui se sauvegardé en base de donnée).

Vous prendrez exemple sur la page https://candidat.pole-emploi.fr/offres/recherche/detail/129FQZF pour en déduire les informations à modéliser dans votre basse de données

Votre site proposera aussi une interface backend permettant de faire le CRUD de votre base de données (ajout, modification et supression d'une annonce + une page permettant de visualiser les réponses faites à une annonce)
