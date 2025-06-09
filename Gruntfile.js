module.exports = function(grunt) {
    grunt.initConfig({
        rollup: {
            options: {
                format: 'amd',
                sourcemap: false
            },
            dist: {
                input: 'amd/src/uteluqchatbot.js',
                output: {
                    file: 'amd/build/uteluqchatbot.min.js'
                }
            }
        },
        clean: {
            build: ['build/']
        },
        stylelint: {
            options: {
                configFile: '.stylelintrc',
                formatter: 'string',
                ignoreDisables: false,
                failOnError: true,
                outputFile: '',
                reportNeedlessDisables: false,
                syntax: ''
            },
            src: ['**/*.css', '**/*.scss']
        }
    });

    grunt.loadNpmTasks('grunt-rollup');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-stylelint');

    grunt.registerTask('amd', []); // Dummy task for compatibility
    grunt.registerTask('default', ['clean', 'stylelint']);
};
