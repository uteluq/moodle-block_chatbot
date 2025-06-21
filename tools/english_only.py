#!/usr/bin/env python3
"""
Script to detect non-English comments in PHP, JS, and Mustache files in the Moodle block_uteluqchatbot project.
This script automatically scans from the project root and reports all non-English comments found.

Prerequisites:
    pip install langdetect

Usage:
    python english_only.py           # Auto-détection de la racine du projet
    python english_only.py -s        # Afficher un rapport sommaire
    python english_only.py -v        # Afficher des informations détaillées pendant l'analyse
    python english_only.py -d /path  # Analyser un répertoire spécifique
    python english_only.py -e .php,.js  # Analyser uniquement les extensions spécifiées
"""
import os
import re
import sys
import argparse
from pathlib import Path
from langdetect import detect, DetectorFactory
from langdetect.lang_detect_exception import LangDetectException

# Ensure consistent language detection
DetectorFactory.seed = 0

# Directories to ignore
IGNORED_DIRS = [
    'node_modules', 
    'vendor', 
    '.git', 
    '__pycache__', 
    '.idea'
]

def extract_comments(file_path):
    """
    Extract comments from PHP, Mustache, or JS files.
    
    Args:
        file_path (str): Path to the file to analyze
    
    Returns:
        list: List of tuples (line_number, comment_text, comment_type)
    """
    comments = []
    extension = os.path.splitext(file_path)[1].lower()
    multi_line_comment = False
    multi_line_start = 0
    current_comment = []

    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            lines = file.readlines()
    except UnicodeDecodeError:
        print(f"Skipping {file_path}: Unable to decode file with UTF-8")
        return comments

    for i, line in enumerate(lines, 1):
        line = line.strip()

        if multi_line_comment:
            if extension == '.mustache' and '--}}' in line:
                multi_line_comment = False
                comment_text = ' '.join(current_comment).strip()
                if comment_text:
                    comments.append((multi_line_start, comment_text, 'multi-line'))
                current_comment = []
            elif extension in ['.php', '.js'] and '*/' in line:
                multi_line_comment = False
                comment_text = ' '.join(current_comment).strip()
                if comment_text:
                    comments.append((multi_line_start, comment_text, 'multi-line'))
                current_comment = []
            else:
                current_comment.append(line)
            continue

        # PHP and JS single-line comments: //
        if extension in ['.php', '.js'] and '//' in line:
            comment = line[line.index('//') + 2:].strip()
            if comment:
                comments.append((i, comment, 'single-line'))

        # PHP single-line comments: #
        if extension == '.php' and '#' in line:
            comment = line[line.index('#') + 1:].strip()
            if comment:
                comments.append((i, comment, 'single-line'))

        # Mustache single-line comments: {{!
        if extension == '.mustache' and '{{!' in line:
            try:
                comment = line[line.index('{{!') + 3:line.index('}}')].strip() if '}}' in line else line[line.index('{{!') + 3:].strip()
                if comment:
                    comments.append((i, comment, 'single-line'))
            except ValueError:
                # Skip malformed Mustache comments
                pass

        # Multi-line comment start
        if extension in ['.php', '.js'] and '/*' in line and not multi_line_comment:
            multi_line_comment = True
            multi_line_start = i
            comment = line[line.index('/*') + 2:].strip()
            if '*/' in line:
                multi_line_comment = False
                comment = comment[:comment.index('*/')].strip()
                if comment:
                    comments.append((i, comment, 'multi-line'))
            else:
                current_comment.append(comment)

        if extension == '.mustache' and '{{!--' in line and not multi_line_comment:
            multi_line_comment = True
            multi_line_start = i
            comment = line[line.index('{{!--') + 5:].strip()
            if '--}}' in line:
                multi_line_comment = False
                comment = comment[:comment.index('--}}')].strip()
                if comment:
                    comments.append((i, comment, 'multi-line'))
            else:
                current_comment.append(comment)

    return comments

def is_non_english(text, min_length=5):
    """
    Detect if the comment text is in a language other than English.
    
    Args:
        text (str): Text to analyze
        min_length (int): Minimum text length to attempt language detection
    
    Returns:
        tuple: (is_non_english, detected_language)
    """
    # Skip very short comments or common code patterns
    if len(text) < min_length:
        return False, 'unknown'
    
    # Skip comments that are likely not actual language (URLs, variable names, etc.)
    if re.match(r'^[a-zA-Z0-9_\-\.\/\\:]+$', text):
        return False, 'unknown'
    
    try:
        lang = detect(text)
        return lang != 'en', lang
    except LangDetectException:
        return False, 'unknown'

def find_project_root():
    """
    Find the project root directory by searching for version.php file.
    
    Returns:
        Path: Path object pointing to the project root directory
    """
    # Start with the directory of this script
    current_dir = Path(__file__).resolve().parent
    
    # Go up to find project root (max 5 levels)
    for _ in range(5):
        # Check if we're in the project root
        if (current_dir / 'version.php').exists():
            return current_dir
        
        parent = current_dir.parent
        if parent == current_dir:  # We've reached the filesystem root
            break
        current_dir = parent
    
    # If we didn't find it, go down from the script directory
    script_dir = Path(__file__).resolve().parent
    
    # Look for version.php in parent directories
    for parent in script_dir.parents:
        if (parent / 'version.php').exists():
            return parent
    
    # If still not found, use the current working directory
    return Path.cwd()

def should_ignore_dir(dir_path):
    """
    Check if the directory should be ignored.
    
    Args:
        dir_path (str): Path to check
    
    Returns:
        bool: True if directory should be ignored
    """
    dir_name = os.path.basename(dir_path)
    return dir_name in IGNORED_DIRS

def scan_directory(directory, extensions=['.php', '.mustache', '.js'], verbose=False):
    """
    Scan directory for files and check for non-English comments.
    
    Args:
        directory (str): Directory to scan
        extensions (list): File extensions to scan
        verbose (bool): Whether to print verbose output
    
    Returns:
        list: List of dictionaries containing non-English comments
    """
    non_english_comments = []
    files_scanned = 0
    comments_checked = 0

    if verbose:
        print(f"Scanning directory: {directory}")
    
    for root, dirs, files in os.walk(directory, topdown=True):
        # Modify dirs in-place to skip ignored directories
        dirs[:] = [d for d in dirs if not should_ignore_dir(os.path.join(root, d))]
        
        for file in files:
            if any(file.endswith(ext) for ext in extensions):
                file_path = os.path.join(root, file)
                files_scanned += 1
                
                if verbose and files_scanned % 50 == 0:
                    print(f"Scanned {files_scanned} files...")
                
                comments = extract_comments(file_path)
                comments_checked += len(comments)
                
                for line_number, comment, comment_type in comments:
                    not_english, lang = is_non_english(comment)
                    if not_english:
                        rel_path = os.path.relpath(file_path, directory)
                        non_english_comments.append({
                            'file': rel_path,
                            'line': line_number,
                            'comment': comment,
                            'type': comment_type,
                            'language': lang
                        })
    
    if verbose:
        print(f"Total files scanned: {files_scanned}")
        print(f"Total comments checked: {comments_checked}")
    
    return non_english_comments

def print_report(non_english_comments, summary=False):
    """
    Print report of non-English comments.
    
    Args:
        non_english_comments (list): List of non-English comments
        summary (bool): Whether to print summary only
    """
    if not non_english_comments:
        print("✓ No non-English comments found.")
        return
    
    file_count = len(set(item['file'] for item in non_english_comments))
    lang_count = {}
    
    for item in non_english_comments:
        lang = item['language']
        lang_count[lang] = lang_count.get(lang, 0) + 1
    
    print(f"\n❌ {len(non_english_comments)} non-English comments found in {file_count} files:")
    
    if summary:
        print("\nLanguage distribution:")
        for lang, count in sorted(lang_count.items(), key=lambda x: x[1], reverse=True):
            print(f"  - {lang}: {count} comments")
        
        print("\nFiles with non-English comments:")
        files = {}
        for item in non_english_comments:
            file = item['file']
            files[file] = files.get(file, 0) + 1
        
        for file, count in sorted(files.items(), key=lambda x: x[1], reverse=True):
            print(f"  - {file}: {count} comments")
    else:
        for item in non_english_comments:
            print(f"\nFile: {item['file']}")
            print(f"Line: {item['line']}")
            print(f"Comment: {item['comment']}")
            print(f"Type: {item['type']}")
            print(f"Detected language: {item['language']}")
            print("-" * 50)

def parse_arguments():
    """
    Parse command-line arguments.
    
    Returns:
        Namespace: Parsed arguments
    """
    parser = argparse.ArgumentParser(
        description='Detect non-English comments in PHP, JS, and Mustache files.'
    )
    parser.add_argument(
        '-d', '--directory',
        help='Directory to scan (defaults to project root)',
        default=None
    )
    parser.add_argument(
        '-e', '--extensions',
        help='File extensions to scan (comma-separated)',
        default='.php,.js,.mustache'
    )
    parser.add_argument(
        '-s', '--summary',
        help='Print summary report instead of detailed report',
        action='store_true'
    )
    parser.add_argument(
        '-v', '--verbose',
        help='Print verbose output',
        action='store_true'
    )
    return parser.parse_args()

def main():
    """Main function."""
    args = parse_arguments()
    
    # Determine directory to scan
    if args.directory:
        directory = args.directory
        if not os.path.isdir(directory):
            print(f"Invalid directory: {directory}")
            return 1
    else:
        # Auto-detect project root
        directory = find_project_root()
        print(f"Auto-detected project root: {directory}")
    
    # Parse extensions
    extensions = [ext if ext.startswith('.') else f'.{ext}' for ext in args.extensions.split(',')]
    
    print(f"Scanning for non-English comments in {', '.join(ext[1:] for ext in extensions)} files...")
    non_english_comments = scan_directory(directory, extensions, args.verbose)
    
    print_report(non_english_comments, args.summary)
    
    return 0 if not non_english_comments else 1

if __name__ == "__main__":
    sys.exit(main())