# MyPlanningRequest

**Contexte** : En tant qu'étudiant on a très souvent besoin de regarder son emploie du temps, mais l'accès peut s'y avérer fastidieux notament du au nombre de clics pour y accéder. La synchronisation sur son téléphone est une solution mais elle pose le problème de l'intégrité. En effet si un cours est supprimé il ne le sera pas directement dans notre agenda téléphone.

**Objectif** : obtenir son emploie du temps le plus rapidement sans même se connecter tout en ayant la la dernière version de celui-ci.

On intéroge planning.univ-rennes1.fr avec l'endpoint jsp/custom/modules/plannings/cal.jsp et on lui fournit les datas correspondant a l'emploie du temps souhaité. Il nous retourne ainsi un fichier .ical que l'on va pouvoir traiter avec PHP

> Template : Schedule Template - by CodyHouse.co
