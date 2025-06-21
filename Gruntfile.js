/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
module.exports = function (grunt) {
    grunt.initConfig({
        uglify: {
            options: {
                mangle: true,
                compress: true
            },
            dist: {
                files: {
                    'amd/build/uteluqchatbot.min.js': ['amd/src/uteluqchatbot.js'],
                    'amd/build/fileupload.min.js': ['amd/src/fileupload.js']
                }
            }
        },
        clean: {
            build: ['amd/build/']
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-clean');
    
    // Définition des tâches
    grunt.registerTask('default', ['uglify']);
    grunt.registerTask('cleanbuild', ['clean']);
    
    // Tâches factices pour la compatibilité
    grunt.registerTask('amd', []);
    grunt.registerTask('stylelint', []);
};