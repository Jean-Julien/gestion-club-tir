<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Gestion club de tir">
        <meta name="author" content="TKT">

        <title>Gestion club de tir</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <!-- bootstrap5 dataTables css cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
        <!-- bootstrap5 dataTables js cdn -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

        <link href="<?php echo CSS ?>date-time-picker-component.min.css" rel="stylesheet">
        <script src="<?php echo JS ?>date-time-picker-component.min.js"></script>
        <script src="<?php echo JS ?>scripts.js"></script>
        <link href="<?php echo CSS ?>calendar.css" rel="stylesheet">
        <link href="<?php echo CSS ?>styles.css" rel="stylesheet">

        <script>
            $(document).ready(function() {
                $('#example').DataTable( {
                    "language": {
                        "emptyTable": "Aucune donnée disponible dans le tableau",
                        "loadingRecords": "Chargement...",
                        "processing": "Traitement...",
                        "aria": {
                            "sortAscending": ": activer pour trier la colonne par ordre croissant",
                            "sortDescending": ": activer pour trier la colonne par ordre décroissant"
                        },
                        "select": {
                            "rows": {
                                "_": "%d lignes sélectionnées",
                                "1": "1 ligne sélectionnée"
                            },
                            "cells": {
                                "1": "1 cellule sélectionnée",
                                "_": "%d cellules sélectionnées"
                            },
                            "columns": {
                                "1": "1 colonne sélectionnée",
                                "_": "%d colonnes sélectionnées"
                            }
                        },
                        "autoFill": {
                            "cancel": "Annuler",
                            "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                            "fillHorizontal": "Remplir les cellules horizontalement",
                            "fillVertical": "Remplir les cellules verticalement"
                        },
                        "searchBuilder": {
                            "conditions": {
                                "date": {
                                    "after": "Après le",
                                    "before": "Avant le",
                                    "between": "Entre",
                                    "empty": "Vide",
                                    "not": "Différent de",
                                    "notBetween": "Pas entre",
                                    "notEmpty": "Non vide",
                                    "equals": "Égal à"
                                },
                                "number": {
                                    "between": "Entre",
                                    "empty": "Vide",
                                    "gt": "Supérieur à",
                                    "gte": "Supérieur ou égal à",
                                    "lt": "Inférieur à",
                                    "lte": "Inférieur ou égal à",
                                    "not": "Différent de",
                                    "notBetween": "Pas entre",
                                    "notEmpty": "Non vide",
                                    "equals": "Égal à"
                                },
                                "string": {
                                    "contains": "Contient",
                                    "empty": "Vide",
                                    "endsWith": "Se termine par",
                                    "not": "Différent de",
                                    "notEmpty": "Non vide",
                                    "startsWith": "Commence par",
                                    "equals": "Égal à",
                                    "notContains": "Ne contient pas",
                                    "notEnds": "Ne termine pas par",
                                    "notStarts": "Ne commence pas par"
                                },
                                "array": {
                                    "empty": "Vide",
                                    "contains": "Contient",
                                    "not": "Différent de",
                                    "notEmpty": "Non vide",
                                    "without": "Sans",
                                    "equals": "Égal à"
                                }
                            },
                            "add": "Ajouter une condition",
                            "button": {
                                "0": "Recherche avancée",
                                "_": "Recherche avancée (%d)"
                            },
                            "clearAll": "Effacer tout",
                            "condition": "Condition",
                            "data": "Donnée",
                            "deleteTitle": "Supprimer la règle de filtrage",
                            "logicAnd": "Et",
                            "logicOr": "Ou",
                            "title": {
                                "0": "Recherche avancée",
                                "_": "Recherche avancée (%d)"
                            },
                            "value": "Valeur"
                        },
                        "searchPanes": {
                            "clearMessage": "Effacer tout",
                            "count": "{total}",
                            "title": "Filtres actifs - %d",
                            "collapse": {
                                "0": "Volet de recherche",
                                "_": "Volet de recherche (%d)"
                            },
                            "countFiltered": "{shown} ({total})",
                            "emptyPanes": "Pas de volet de recherche",
                            "loadMessage": "Chargement du volet de recherche...",
                            "collapseMessage": "Réduire tout",
                            "showMessage": "Montrer tout"
                        },
                        "buttons": {
                            "collection": "Collection",
                            "colvis": "Visibilité colonnes",
                            "colvisRestore": "Rétablir visibilité",
                            "copy": "Copier",
                            "copySuccess": {
                                "1": "1 ligne copiée dans le presse-papier",
                                "_": "%ds lignes copiées dans le presse-papier"
                            },
                            "copyTitle": "Copier dans le presse-papier",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Afficher toutes les lignes",
                                "_": "Afficher %d lignes"
                            },
                            "pdf": "PDF",
                            "print": "Imprimer",
                            "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier."
                        },
                        "decimal": ",",
                        "search": "Rechercher:",
                        "thousands": ".",
                        "datetime": {
                            "previous": "Précédent",
                            "next": "Suivant",
                            "hours": "Heures",
                            "minutes": "Minutes",
                            "seconds": "Secondes",
                            "unknown": "-",
                            "amPm": [
                                "am",
                                "pm"
                            ],
                            "months": {
                                "0": "Janvier",
                                "2": "Mars",
                                "3": "Avril",
                                "4": "Mai",
                                "5": "Juin",
                                "6": "Juillet",
                                "8": "Septembre",
                                "9": "Octobre",
                                "10": "Novembre",
                                "1": "Février",
                                "11": "Décembre",
                                "7": "Août"
                            },
                            "weekdays": [
                                "Dim",
                                "Lun",
                                "Mar",
                                "Mer",
                                "Jeu",
                                "Ven",
                                "Sam"
                            ]
                        },
                        "editor": {
                            "close": "Fermer",
                            "create": {
                                "title": "Créer une nouvelle entrée",
                                "button": "Nouveau",
                                "submit": "Créer"
                            },
                            "edit": {
                                "button": "Editer",
                                "title": "Editer Entrée",
                                "submit": "Mettre à jour"
                            },
                            "remove": {
                                "button": "Supprimer",
                                "title": "Supprimer",
                                "submit": "Supprimer",
                                "confirm": {
                                    "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                    "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                }
                            },
                            "error": {
                                "system": "Une erreur système s'est produite"
                            },
                            "multi": {
                                "noMulti": "Ce champ peut être édité individuellement, mais ne fait pas partie d'un groupe. ",
                                "title": "Valeurs multiples",
                                "restore": "Rétablir modification",
                                "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles."
                            }
                        },
                        "stateRestore": {
                            "removeSubmit": "Supprimer",
                            "creationModal": {
                                "button": "Créer",
                                "name": "Nom :",
                                "order": "Tri",
                                "paging": "Pagination",
                                "scroller": "Position du défilement",
                                "search": "Recherche",
                                "select": "Sélection",
                                "toggleLabel": "Inclus :"
                            },
                            "renameButton": "Renommer"
                        },
                        "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                        "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                        "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                        "lengthMenu": "Afficher _MENU_ entrées",
                        "paginate": {
                            "first": "Première",
                            "last": "Dernière",
                            "next": "Suivante",
                            "previous": "Précédente"
                        },
                        "zeroRecords": "Aucune entrée correspondante trouvée"
                    }
                } );
            } );
        </script>

        <script>
            $(document).ready(function() {
                $('#example2').DataTable( {
                    "language": {
                        "emptyTable": "Aucune donnée disponible dans le tableau",
                        "loadingRecords": "Chargement...",
                        "processing": "Traitement...",
                        "aria": {
                            "sortAscending": ": activer pour trier la colonne par ordre croissant",
                            "sortDescending": ": activer pour trier la colonne par ordre décroissant"
                        },
                        "select": {
                            "rows": {
                                "_": "%d lignes sélectionnées",
                                "1": "1 ligne sélectionnée"
                            },
                            "cells": {
                                "1": "1 cellule sélectionnée",
                                "_": "%d cellules sélectionnées"
                            },
                            "columns": {
                                "1": "1 colonne sélectionnée",
                                "_": "%d colonnes sélectionnées"
                            }
                        },
                        "autoFill": {
                            "cancel": "Annuler",
                            "fill": "Remplir toutes les cellules avec <i>%d<\/i>",
                            "fillHorizontal": "Remplir les cellules horizontalement",
                            "fillVertical": "Remplir les cellules verticalement"
                        },
                        "searchBuilder": {
                            "conditions": {
                                "date": {
                                    "after": "Après le",
                                    "before": "Avant le",
                                    "between": "Entre",
                                    "empty": "Vide",
                                    "not": "Différent de",
                                    "notBetween": "Pas entre",
                                    "notEmpty": "Non vide",
                                    "equals": "Égal à"
                                },
                                "number": {
                                    "between": "Entre",
                                    "empty": "Vide",
                                    "gt": "Supérieur à",
                                    "gte": "Supérieur ou égal à",
                                    "lt": "Inférieur à",
                                    "lte": "Inférieur ou égal à",
                                    "not": "Différent de",
                                    "notBetween": "Pas entre",
                                    "notEmpty": "Non vide",
                                    "equals": "Égal à"
                                },
                                "string": {
                                    "contains": "Contient",
                                    "empty": "Vide",
                                    "endsWith": "Se termine par",
                                    "not": "Différent de",
                                    "notEmpty": "Non vide",
                                    "startsWith": "Commence par",
                                    "equals": "Égal à",
                                    "notContains": "Ne contient pas",
                                    "notEnds": "Ne termine pas par",
                                    "notStarts": "Ne commence pas par"
                                },
                                "array": {
                                    "empty": "Vide",
                                    "contains": "Contient",
                                    "not": "Différent de",
                                    "notEmpty": "Non vide",
                                    "without": "Sans",
                                    "equals": "Égal à"
                                }
                            },
                            "add": "Ajouter une condition",
                            "button": {
                                "0": "Recherche avancée",
                                "_": "Recherche avancée (%d)"
                            },
                            "clearAll": "Effacer tout",
                            "condition": "Condition",
                            "data": "Donnée",
                            "deleteTitle": "Supprimer la règle de filtrage",
                            "logicAnd": "Et",
                            "logicOr": "Ou",
                            "title": {
                                "0": "Recherche avancée",
                                "_": "Recherche avancée (%d)"
                            },
                            "value": "Valeur"
                        },
                        "searchPanes": {
                            "clearMessage": "Effacer tout",
                            "count": "{total}",
                            "title": "Filtres actifs - %d",
                            "collapse": {
                                "0": "Volet de recherche",
                                "_": "Volet de recherche (%d)"
                            },
                            "countFiltered": "{shown} ({total})",
                            "emptyPanes": "Pas de volet de recherche",
                            "loadMessage": "Chargement du volet de recherche...",
                            "collapseMessage": "Réduire tout",
                            "showMessage": "Montrer tout"
                        },
                        "buttons": {
                            "collection": "Collection",
                            "colvis": "Visibilité colonnes",
                            "colvisRestore": "Rétablir visibilité",
                            "copy": "Copier",
                            "copySuccess": {
                                "1": "1 ligne copiée dans le presse-papier",
                                "_": "%ds lignes copiées dans le presse-papier"
                            },
                            "copyTitle": "Copier dans le presse-papier",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Afficher toutes les lignes",
                                "_": "Afficher %d lignes"
                            },
                            "pdf": "PDF",
                            "print": "Imprimer",
                            "copyKeys": "Appuyez sur ctrl ou u2318 + C pour copier les données du tableau dans votre presse-papier."
                        },
                        "decimal": ",",
                        "search": "Rechercher:",
                        "thousands": ".",
                        "datetime": {
                            "previous": "Précédent",
                            "next": "Suivant",
                            "hours": "Heures",
                            "minutes": "Minutes",
                            "seconds": "Secondes",
                            "unknown": "-",
                            "amPm": [
                                "am",
                                "pm"
                            ],
                            "months": {
                                "0": "Janvier",
                                "2": "Mars",
                                "3": "Avril",
                                "4": "Mai",
                                "5": "Juin",
                                "6": "Juillet",
                                "8": "Septembre",
                                "9": "Octobre",
                                "10": "Novembre",
                                "1": "Février",
                                "11": "Décembre",
                                "7": "Août"
                            },
                            "weekdays": [
                                "Dim",
                                "Lun",
                                "Mar",
                                "Mer",
                                "Jeu",
                                "Ven",
                                "Sam"
                            ]
                        },
                        "editor": {
                            "close": "Fermer",
                            "create": {
                                "title": "Créer une nouvelle entrée",
                                "button": "Nouveau",
                                "submit": "Créer"
                            },
                            "edit": {
                                "button": "Editer",
                                "title": "Editer Entrée",
                                "submit": "Mettre à jour"
                            },
                            "remove": {
                                "button": "Supprimer",
                                "title": "Supprimer",
                                "submit": "Supprimer",
                                "confirm": {
                                    "_": "Êtes-vous sûr de vouloir supprimer %d lignes ?",
                                    "1": "Êtes-vous sûr de vouloir supprimer 1 ligne ?"
                                }
                            },
                            "error": {
                                "system": "Une erreur système s'est produite"
                            },
                            "multi": {
                                "noMulti": "Ce champ peut être édité individuellement, mais ne fait pas partie d'un groupe. ",
                                "title": "Valeurs multiples",
                                "restore": "Rétablir modification",
                                "info": "Les éléments sélectionnés contiennent différentes valeurs pour cette entrée. Pour modifier et définir tous les éléments de cette entrée à la même valeur, cliquez ou tapez ici, sinon ils conserveront leurs valeurs individuelles."
                            }
                        },
                        "stateRestore": {
                            "removeSubmit": "Supprimer",
                            "creationModal": {
                                "button": "Créer",
                                "name": "Nom :",
                                "order": "Tri",
                                "paging": "Pagination",
                                "scroller": "Position du défilement",
                                "search": "Recherche",
                                "select": "Sélection",
                                "toggleLabel": "Inclus :"
                            },
                            "renameButton": "Renommer"
                        },
                        "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                        "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                        "infoFiltered": "(filtrées depuis un total de _MAX_ entrées)",
                        "lengthMenu": "Afficher _MENU_ entrées",
                        "paginate": {
                            "first": "Première",
                            "last": "Dernière",
                            "next": "Suivante",
                            "previous": "Précédente"
                        },
                        "zeroRecords": "Aucune entrée correspondante trouvée"
                    }
                } );
            } );
        </script>
    </head>

    <body class="bg-secondary">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo IMG ?>logo.png" alt="logo" width="32" height="32">
                    Projet TKT
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?r=home">Accueil</a>
                        </li>
                        <?php if (isset($_SESSION['loggedin'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?r=reservation">Réservation</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?r=contact">Contact</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['loggedin'])){?>
                        <div class="flex-shrink-0 dropdown">
                            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo "Bienvenue " . $_SESSION['prenom']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser2">
                                <li><a class="dropdown-item" href="#">Mon profil</a></li>
                                <li><a class="dropdown-item" href="index.php?r=mesReservation">Mes réservations</a></li>
                                <li><a class="dropdown-item" href="index.php?r=changePsw">Changer mon mot de passe</a></li>
                                <?php if ($_SESSION['idRole'] == '1') { ?>
                                    <li><a class="dropdown-item" href="index.php?r=admin/confirmuser">Liste des utilisateurs</a></li>
                                    <li><a class="dropdown-item" href="index.php?r=admin/managePlatform">Gestion de pas de tir</a></li>
                                    <li><a class="dropdown-item" href="index.php?r=admin/showFeedback">Voir les feedback</a></li>
                                <?php } ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?r=logout">Se déconnecter</a></li>
                            </ul>
                        </div>
                    <?php }else{ ?>
                        <div class="flex-shrink-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?r=login">Se connecter</a>
                            </li>
                        </div>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- ma page -->
        <?php
            echo $contentPage;
        ?>

        <div class="row py-3 footer fixed-bottom sticky-bottom bg-dark">
            <div class="col-6 d-flex align-items-center px-4"> 
                <div class="p-0 text-white">TKT © 2021 Copyright</div>
            </div>

            <div class="col-6 justify-content-end d-flex px-4">
                <a class="text-white fw-bold" href="index.php?r=feedback">Donnez-nous votre avis</a>
            </div>
        </div>
    </body>
</html>