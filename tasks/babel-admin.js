module.exports = function (gulp, $, browserSync) {
	gulp.task('tao-js-admin', function () {
		return gulp.src([
				'./admin/scripts/_core/*.js',
				'./admin/scripts/*.js'
			])
			.pipe($.sourcemaps.init())
			.pipe($.concat('admin.js'))
			.pipe($.babel())
			.pipe($.sourcemaps.write(''))
			.pipe(gulp.dest('./admin/dist/js'));
	});
};
