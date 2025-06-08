/**
 * @copyright 2025 Université TÉLUQ
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
            }
        }
    });

    grunt.loadNpmTasks('grunt-rollup');
    grunt.registerTask('default', ['rollup']);
};
