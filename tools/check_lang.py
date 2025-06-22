import os
import re
import argparse

def scan_files_for_strings(directory):
    # Set to store all found 'x' values
    x_values = set()
    
    # Regular expressions for different patterns
    get_string_pattern = r"get_string\s*\(\s*['\"]([^'\"]+)['\"]\s*,.*?\)"
    mustache_pattern = r"\{\{#str\}\}\s*([^,\s]+)\s*,\s*block_uteluqchatbot\s*\{\{/str\}\}"
    
    # Walk through directory
    for root, dirs, files in os.walk(directory):
        # Skip directories named 'lang'
        if 'lang' in dirs:
            dirs.remove('lang')
        
        for file in files:
            if file.endswith(('.php', '.js', '.mustache')):
                file_path = os.path.join(root, file)
                try:
                    with open(file_path, 'r', encoding='utf-8') as f:
                        content = f.read()
                        # Check for get_string in PHP and JS files
                        if file.endswith(('.php', '.js')):
                            matches = re.finditer(get_string_pattern, content)
                            for match in matches:
                                x_value = match.group(1)
                                x_values.add(x_value)
                        # Check for {{#str}} in Mustache files
                        if file.endswith('.mustache'):
                            matches = re.finditer(mustache_pattern, content)
                            for match in matches:
                                x_value = match.group(1)
                                x_values.add(x_value)
                except Exception as e:
                    print(f"Error reading {file_path}: {str(e)}")
    
    return x_values

def load_language_file(lang_file_path):
    # Set to store keys from language file
    lang_keys = set()
    
    # Regular expression to match $string['key'] = "...";
    pattern = r"\$string\s*\[\s*['\"]([^'\"]+)['\"]\s*\]\s*=\s*['\"].*?['\"]\s*;"
    # Regex for heredoc/nowdoc: $string['key'] = <<<EOT
    heredoc_pattern = r"\$string\s*\[\s*['\"]([^'\"]+)['\"]\s*\]\s*=\s*<<<['\"]?(\w+)['\"]?"
    try:
        with open(lang_file_path, 'r', encoding='utf-8') as f:
            content = f.read()
            # Classic assignments
            matches = re.finditer(pattern, content, re.DOTALL)
            for match in matches:
                key = match.group(1)
                lang_keys.add(key)
            # Heredoc/nowdoc assignments
            matches_heredoc = re.finditer(heredoc_pattern, content)
            for match in matches_heredoc:
                key = match.group(1)
                lang_keys.add(key)
    except Exception as e:
        print(f"Error reading language file {lang_file_path}: {str(e)}")
        return None
    
    return lang_keys

def compare_keys(x_values, lang_keys):
    # Find discrepancies
    missing_in_lang = x_values - lang_keys
    unused_in_lang = lang_keys - x_values
    
    return missing_in_lang, unused_in_lang

def main():
    parser = argparse.ArgumentParser(description="Check language string usage.")
    parser.add_argument('-F', '--full', action='store_true', help='Show all keys, including those defined in language file but not used in code')
    args = parser.parse_args()

    # Automatically detect the project root (parent directory of tools/)
    current_dir = os.path.dirname(os.path.abspath(__file__))  # Get the directory of this script
    directory = os.path.dirname(current_dir)  # Get the parent directory (project root)
    print(f"Detected project root: {directory}")
    if not os.path.isdir(directory):
        print("Invalid directory path!")
        return

    # Scan for get_string and {{#str}} keys (all code)
    print("Scanning files for get_string and {{#str}} keys...")
    x_values = scan_files_for_strings(directory)

    # Scan all language files
    lang_dir = os.path.join(directory, 'lang')
    if not os.path.isdir(lang_dir):
        print("No lang directory found!")
        return

    error_found = False
    for lang in sorted(os.listdir(lang_dir)):
        lang_file_path = os.path.join(lang_dir, lang, 'block_uteluqchatbot.php')
        if not os.path.isfile(lang_file_path):
            continue
        print(f"\n=== Language: {lang} ===")
        lang_keys = load_language_file(lang_file_path)
        if lang_keys is None:
            print("Failed to load language file.")
            continue
        missing_in_lang, unused_in_lang = compare_keys(x_values, lang_keys)
        if missing_in_lang:
            print("Keys used in code but missing in language file:")
            for key in sorted(missing_in_lang):
                print(f"- {key}")
            error_found = True
        else:
            print("No keys missing in language file.")
        if unused_in_lang and args.full:
            print("Keys defined in language file but not used in code:")
            for key in sorted(unused_in_lang):
                print(f"- {key}")
        elif not unused_in_lang:
            print("No unused keys in language file.")
        print(f"Total keys found in code: {len(x_values)}")
        print(f"Total keys in language file: {len(lang_keys)}")
    return 1 if error_found else 0

if __name__ == "__main__":
    import sys
    sys.exit(main())