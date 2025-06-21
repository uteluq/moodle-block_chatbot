# Maintenance Guide - Block UTELUQ Chatbot

## Prerequisites

### Installing Node.js and ## Maintenance Tools

### Check for console.log statements

```bash
python tools/check_console.py
```

### Language String Analysis

The `ch.py` script in the project root checks the language files for missing or unused strings:

```bash
python ch.py
```

### Non-English Comment Detection

The `tools/english_only.py` script scans PHP, JS, and Mustache files for comments not written in English:

1. Install the required dependency:
   ```bash
   pip install langdetect
   ```

2. Run the script:
   ```bash
   python tools/english_only.py
   ```

   Additional options:
   ```bash
   # Summary report
   python tools/english_only.py --summary
   
   # Verbose output
   python tools/english_only.py --verbose
   
   # Scan specific file extensions
   python tools/english_only.py --extensions .php,.js
   ```

For more information, see `tools/README.md`.

## Versioningure Node.js is installed (npm is included with Node.js)
   - Verify the installation with the commands: `node -v` and `npm -v`
   - If not installed, download it from [nodejs.org](https://nodejs.org/)

## Setting up the Development Environment

1. **Navigate to the project directory**:
   ```bash
   cd path/to/moodle-block_uteluqchatbot
   ```

2. **Install dependencies**:
   ```bash
   npm install
   ```
   This command creates a `node_modules` folder with all required modules.

3. **Verify Grunt installation**:
   - Grunt should be listed as a dependency in `package.json`
   - If you want to run Grunt directly, install Grunt CLI globally:
   ```bash
   npm install -g grunt-cli
   ```

## Generating Minified Files

The project uses Grunt to minify JavaScript files for production.

1. **Run Grunt**:
   ```bash
   grunt
   ```
   This command executes the default task defined in `Gruntfile.js`, which minifies the JavaScript files.

   - Source files in `amd/src/` are minified into `amd/build/`
   - The process generates optimized `.min.js` files for production

2. **Specific tasks**:
   - To clean the generated files:
   ```bash
   grunt cleanbuild
   ```

3. **View available tasks**:
   ```bash
   grunt --help
   ```

## Troubleshooting

If you encounter problems with Grunt or generating minified files:

1. **If `grunt` is not found**:
   - Make sure `grunt-cli` is installed globally or run Grunt via npm:
   ```bash
   npx grunt
   ```

2. **If dependencies fail to install properly**:
   - Delete the `node_modules` folder and the `package-lock.json` file, then run `npm install` again

3. **If a task fails**:
   - Check `Gruntfile.js` for errors or missing plugins
   - Make sure all required plugins are listed in `package.json`

## JavaScript File Structure

- `amd/src/`: Contains JavaScript source files
  - `uteluqchatbot.js`: Main chatbot functionality
  - `fileupload.js`: File upload management

- `amd/build/`: Contains generated minified JavaScript files
  - `uteluqchatbot.min.js`: Minified version of the main file
  - `fileupload.min.js`: Minified version of the upload manager

## Languages

The project supports multiple languages via files in the `lang/` folder. To add or modify language strings:

1. Modify the appropriate file in `lang/XX/block_uteluqchatbot.php` where XX is the language code
2. To add a new language, create a new folder with the language code and copy the structure from `lang/en/`
3. You can use the `ch.py` script to check the consistency of language strings between different languages

## Check for console.log statements

```
python tools/check_console.py
```

## Check lang files for consistency


```
python tools/check_lang.py
```

## Versioning

When updating the plugin, make sure to update the version in `version.php` as well as `$plugin->version`.
