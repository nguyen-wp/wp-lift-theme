module.exports = function (gulp, $, browserSync) {
	let strip = require('gulp-strip-comments');
	gulp.task('js-min-admin', function () {
		return gulp.src([
				'./admin/dist/js/*.js',
				'!./admin/dist/js/lift.js',
			])
			.pipe($.uglify())
			.pipe(strip())
			// .pipe($.rename({
            //     suffix: '.min'
            // }))
			.pipe(gulp.dest('./admin/dist/js'));
	});
};
