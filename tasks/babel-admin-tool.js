module.exports = function (gulp, $, browserSync) {
	gulp.task('tao-js-tool', function () {
		return gulp.src([
				'./src/scripts/admin-tool.js'
			])
			.pipe($.sourcemaps.init())
			.pipe($.babel())
			.pipe($.sourcemaps.write(''))
			.pipe(gulp.dest('./dist/js'));
	});
};
