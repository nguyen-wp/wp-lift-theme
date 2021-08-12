module.exports = function (gulp, $, browserSync) {
	gulp.task('clean', function () {
		return gulp.src([
			'./dist/**/*.*',
			'!./dist/css/style.css',
			'!./dist/css/export.css',
			'!./dist/css/theme.css',
			'!./dist/js/theme.js',
		], {read: false, allowEmpty: true })
			.pipe($.clean({force: true}));
	});
};
