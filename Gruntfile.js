module.exports = (grunt) => {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        // SASS TASK
        sass: {
            dev: {
                options: {
                    style: 'expanded'  
                },
                files: {
                    'compiled/style.css': 'sass/style.scss'
                }
            },
            dist: {
                options: {
                    style: 'compressed'   
                },
                files: {
                    'compiled/style-min.css': 'sass/style.scss'
                }
            }
        },

        // WATCH TASK
        watch: {
            css: {
                files: '**/*.scss',
                tasks: ['sass','autoprefixer']
            }
        },

        // AUTO PREFIXER 
        autoprefixer: {
            options: {
                browsers: ['last 2 versions']
            },
            // Prefix all the files
            multiple_files: {
                expand: true,
                flatten: true,
                src: './compiled/*.css',
                dest: ''
            }
        },

        // BROWSER SYNC TASK
        browserSync: {
            dev: {
                bsFiles: {
                    src : [
                        '**/*.css',
                        '**/*.html',
                    ]
                },
                options: {
                    watchTask: true,
                    open: 'external',
		            proxy: 'http://localhost:8888/WPJuniorDev/Project1/wordpress/',
		            port: 8080
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.registerTask('default', ['browserSync','watch']);
}