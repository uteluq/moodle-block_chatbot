/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
module.exports = function (grunt) {
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
            },
            clean: {
                build: ['build/']
            }
        }
    });

    grunt.loadNpmTasks('grunt-rollup');
    grunt.registerTask('default', ['rollup', 'clean']);

    grunt.registerTask('amd', []); // Dummy task for compatibility
    grunt.registerTask('stylelint', []); // Dummy task for compatibility
};