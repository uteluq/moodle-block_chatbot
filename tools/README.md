# Outils de développement pour block_uteluqchatbot

Ce répertoire contient des outils utiles pour analyser et maintenir le code du plugin block_uteluqchatbot.

## english_only.py

Cet outil détecte les commentaires non anglais dans le code source (fichiers PHP, JS et Mustache).

### Installation des dépendances

```bash
pip install langdetect
```

### Utilisation

```bash
# Analyse automatique depuis la racine du projet
python english_only.py

# Afficher un rapport sommaire au lieu des détails complets
python english_only.py --summary

# Mode verbeux montrant la progression
python english_only.py --verbose

# Analyser un répertoire spécifique
python english_only.py --directory /chemin/vers/repertoire

# Analyser uniquement certaines extensions
python english_only.py --extensions .php,.js
```

### Options

- `-d`, `--directory` : Spécifier le répertoire à analyser (par défaut : détection automatique de la racine du projet)
- `-e`, `--extensions` : Extensions de fichiers à analyser, séparées par des virgules (par défaut : .php,.js,.mustache)
- `-s`, `--summary` : Afficher uniquement un résumé des résultats
- `-v`, `--verbose` : Afficher des informations détaillées pendant l'analyse

### Exemple de sortie

```
Auto-detected project root: /path/to/moodle-block_uteluqchatbot
Scanning for non-English comments in php, js, mustache files...

❌ 5 non-English comments found in 3 files:

File: classes/external/upload_files.php
Line: 42
Comment: Cette fonction vérifie la taille du fichier
Type: single-line
Detected language: fr
--------------------------------------------------
```

## Autres outils

Ajoutez ici la documentation pour les autres outils au fur et à mesure qu'ils sont développés.
