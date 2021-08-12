'use strict';
// Gọi thư viện sử dụng vào
var gulp = require('gulp');
var plugins = require('gulp-load-plugins')({ lazy: true });
var browserSync = require('browser-sync').create();
var taskPath = './tasks/';
var taskList = require('fs').readdirSync(taskPath);
// Load tất cả các task
taskList.forEach(function (taskFile) {
    require(taskPath + taskFile)(gulp, plugins, browserSync);
});

// Lệnh mặc định của Gulp
gulp.task('default', gulp.series(
		'clean',
		'copy-img',
		'copy-css',
		'copy-fonts',
		'copy-webfonts',
		'copy-favicon',
		'copy-files',
		'concat-css',
		'concat-js',
		'tao-sass',
		'tao-js',
		'tao-js-admin',
		'tao-js-tool',
		'tao-sass-admin',
		// 'tao-html',
		'watch',
		'browser-sync',
		function (done) {
			done();
		})
);
gulp.task('build', gulp.series(
		'clean',
		'copy-img',
		'copy-css',
		'copy-fonts',
		'copy-webfonts',
		'copy-favicon',
		'copy-files',
		'concat-css',
		'concat-js',
		'tao-sass',
		'tao-js',
		'tao-js-admin',
		'tao-js-tool',
		'tao-sass-admin',
		// 'tao-html',
		// Xử lý Production
		// 'html-min',
		'css-min',
		'js-min',
		'css-min-admin',
		'js-min-admin',
		'autoprefixer',
		// 'browser-sync',
		function (done) {
			done();
		})
);
