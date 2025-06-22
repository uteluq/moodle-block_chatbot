# Development Tools for block_uteluqchatbot

This directory contains useful tools for analyzing and maintaining the block_uteluqchatbot plugin code.

## english_only.py

This tool detects non-English comments in the source code (PHP, JS, and Mustache files).

### Installing dependencies

```bash
pip install langdetect
```

### Usage

```bash
# Automatic scan from the project root
python english_only.py

# Show a summary report instead of full details
python english_only.py --summary

# Verbose mode showing progress
python english_only.py --verbose

# Scan a specific directory
python english_only.py --directory /path/to/directory

# Scan only certain extensions
python english_only.py --extensions .php,.js
```

### Options

- `-d`, `--directory`: Specify the directory to scan (default: auto-detect project root)
- `-e`, `--extensions`: File extensions to scan, comma-separated (default: .php,.js,.mustache)
- `-s`, `--summary`: Show only a summary of the results
- `-v`, `--verbose`: Show detailed information during the scan

### Example output

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

## Other tools

Add documentation for other tools here as they are developed.
