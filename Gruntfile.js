module.exports = function(grunt) {
    grunt.initConfig({
        rollup: {
            options: {
                format: 'amd',
                sourcemap: false
            },
            dist: {
                input: 'amd/src/chatbot.js',
                output: {
                    file: 'amd/build/chatbot.min.js'
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-rollup');
    grunt.registerTask('default', ['rollup']);
};
