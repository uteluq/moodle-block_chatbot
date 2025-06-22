import os
import re
import sys

def get_js_files(parent_dir):
    """
    Find all .js files in any subdirectory of the parent directory, excluding node_modules.
    Returns a list of file paths.
    """
    js_files = []
    for root, dirs, files in os.walk(parent_dir):
        # Exclude node_modules from traversal
        dirs[:] = [d for d in dirs if d != 'node_modules']
        for file in files:
            if file.endswith('.js'):
                js_files.append(os.path.join(root, file))
    return js_files

def check_console_log(file_path):
    """
    Check a .js file for 'console.log'.
    Returns a list of tuples: (line_number, line_text) for lines containing 'console.log'.
    """
    violations = []
    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            lines = file.readlines()
            for i, line in enumerate(lines, 1):
                # Check for 'console.log' in the line (case-sensitive)
                if 'console.log' in line:
                    violations.append((i, line.strip()))
    except UnicodeDecodeError:
        print(f"Skipping {file_path}: Unable to decode file with UTF-8")
    except Exception as e:
        print(f"Error reading {file_path}: {e}")
    return violations

def main():
    # Get the directory where the script is located
    script_dir = os.path.dirname(os.path.abspath(__file__))
    
    # Move to the parent directory
    parent_dir = os.path.dirname(script_dir)
    
    print(f"Scanning for .js files in: {parent_dir}")
    
    # Find all .js files
    js_files = get_js_files(parent_dir)
    
    if not js_files:
        print("No .js files found in any subdirectory.")
        return 0
    
    print(f"Found {len(js_files)} .js files. Checking for 'console.log'...")
    
    # Check each file for console.log
    violations_found = False
    for file_path in js_files:
        violations = check_console_log(file_path)
        if violations:
            violations_found = True
            print(f"\nFile: {file_path}")
            for line_number, line_text in violations:
                print(f"Line {line_number}: {line_text}")
    
    if not violations_found:
        print("No instances of 'console.log' found in any .js files.")
    
    # Return error code if any violation found
    return 1 if violations_found else 0

if __name__ == "__main__":
    sys.exit(main())