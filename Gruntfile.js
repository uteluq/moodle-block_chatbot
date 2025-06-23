/**
* @copyright 2025 Université TÉLUQ and the Université Gaston-Berger
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
   
   // Task definitions
   grunt.registerTask('default', ['uglify']);
   grunt.registerTask('cleanbuild', ['clean']);
   
   // Dummy tasks for compatibility
   grunt.registerTask('amd', []);
   grunt.registerTask('stylelint', []);
};